<?php

namespace App\Http\Controllers;

use App\Events\BookingEvent;
use App\Events\ProcessBookingEvent;
use App\Notifications\ProcessedBookingNotification;
use App\Repositories\BookingTour\BookingRepositoryInterface;
use Pusher\Pusher;
use Illuminate\Support\Facades\Notification;


class HandleBookingRequest extends Controller
{
    protected $bookingRepo;
    public function __construct(BookingRepositoryInterface $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function getBookingRequest()
    {
        $bookingReqs = $this->bookingRepo->getNotApprovedBookingRequest();
        // dd($bookingReqs);
        return view('admin.processBooking', [
            'bookingReqs' => $bookingReqs,
        ]);
    }

    public function approveBookingRequest($id)
    {
        $approvedTour = $this->bookingRepo->approved($id);

        $dataNotification = [
            'booked_user_name' => $approvedTour->user->name,
            'tour_name' => $approvedTour->tour->name,
            'booking_start_date' => $approvedTour->booking_start_date,
            'status' => $approvedTour->status,
        ];

        // event(new BookingEvent($dataNotification));

        event(new ProcessBookingEvent($approvedTour->user->id, $dataNotification));
        Notification::send($approvedTour->user, new ProcessedBookingNotification($dataNotification));

        return redirect()->back()->with('msg_success', trans('messages.approved_booking_request'));
    }
    public function rejectBookingRequest($id)
    {
        $rejectedTour = $this->bookingRepo->reject($id);

        $dataNotification = [
            'booked_user_name' => $rejectedTour->user->name,
            'tour_name' => $rejectedTour->tour->name,
            'booking_start_date' => $rejectedTour->booking_start_date,
            'status' => $rejectedTour->status,
        ];

        event(new ProcessBookingEvent($rejectedTour->user->id, $dataNotification));
        Notification::send($rejectedTour->user, new ProcessedBookingNotification($dataNotification));

        return redirect()->back()->with('msg_reject', trans('messages.rejected_booking_request'));
    }
}
