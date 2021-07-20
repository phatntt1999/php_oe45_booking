<?php

namespace Tests\Unit\Events;

use App\Events\NotificationBookingEvent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class NotificationBookingEventTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDispatchBookingEventNotification()
    {
        Event::fake();

        $data = [
            'booked_user_name' => 'Phat',
            'tour_name' => 'Hue 3 ngay 2 dem',
            'booking_start_date' => '2021-07-28',
            'booked_user_email' => 'phatntt1999002@gmail.com',
        ];

        event(new NotificationBookingEvent($data));

        Event::assertDispatched(NotificationBookingEvent::class);
    }
}
