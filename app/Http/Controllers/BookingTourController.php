<?php

namespace App\Http\Controllers;

use App\Events\NotificationBookingEvent;
use App\Jobs\SendEmail;
use App\Notifications\BookingNotificationToAdmin;
use App\Repositories\BookingTour\BookingRepositoryInterface;
use App\Repositories\Tour\TourRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class BookingTourController extends Controller
{
    protected $tourRepo;
    protected $bookingRepo;
    protected $userRepo;

    public function __construct(
        TourRepositoryInterface $tourRepo,
        BookingRepositoryInterface $bookingRepo,
        UserRepositoryInterface $userRepo
    ) {
        $this->tourRepo = $tourRepo;
        $this->bookingRepo = $bookingRepo;
        $this->userRepo = $userRepo;
    }

    public function showBookingTour(Request $request)
    {
        $user = $this->tourRepo->getCurrentUser();
        $selectedTour = $this->tourRepo->find($request->tour);

        return view('booking.booking_form', [
            'user' => $user,
            'selectedTour' => $selectedTour,
        ]);
    }
    public function storeBookingTour(Request $request)
    {
        $account = $this->userRepo->getCurrentUser();
        $inputDateStart = strtotime($request->dateStart);
        $dateStart = date('Y-m-d', $inputDateStart);
        $status = -1;
        $dataBooking = [
            'tour_id' => $request->tourId,
            'account_id' => $account->id,
            'duration' => $request->duration,
            'total_price' => $request->totalPrice,
            'booking_start_date' => $dateStart,
            'status' => $status,
            'quantity' => $request->quantity,
        ];
        $bookingResult = $this->bookingRepo->create($dataBooking);

        // $message = [
        //     'type' => 'Create booking',
        //     'task' => $bookingResult->tour->name,
        //     'content' => 'has been created!',
        // ];
        // SendEmail::dispatch($message)->delay(now()->addMinute(1));
        $data = [
            'booked_user_name' => $bookingResult->user->name,
            'tour_name' => $bookingResult->tour->name,
            'booking_start_date' => $dateStart,
            'booked_user_email' => $bookingResult->user->email,
        ];

        event(new NotificationBookingEvent($data));

        Notification::send($account, new BookingNotificationToAdmin($data));
        Notification::send($this->userRepo->getAdmin(), new BookingNotificationToAdmin($data));


        return view('booking.vnp_payment', [
            'totalPrice' => $bookingResult->total_price,
            'bookingId' => $bookingResult->id,
        ]);
    }
}
