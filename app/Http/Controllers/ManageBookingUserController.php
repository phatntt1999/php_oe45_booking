<?php

namespace App\Http\Controllers;

use App\Repositories\BookingTour\BookingRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class ManageBookingUserController extends Controller
{
    private $bookingRepo;
    private $userRepo;
    public function __construct(BookingRepositoryInterface $bookingRepo, UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->bookingRepo = $bookingRepo;
    }

    public function index()
    {
        $bookings = $this->bookingRepo->getBookingOfCurrentUser();

        return view('booking_user', [
            'bookings' => $bookings,
        ]);
    }
}
