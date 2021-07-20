<?php

namespace Tests\Unit\Events;

use App\Events\ProcessBookingEvent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Support\Str;


class ProcessBookingEventTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
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
            'status' => 0,
        ];

        event(new ProcessBookingEvent($this->user->id, $data));

        Event::assertDispatched(ProcessBookingEvent::class);
    }
}
