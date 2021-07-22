<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProcessedBookingNotification extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if ($this->data['status'] == 0) {
            return (new MailMessage)
                ->from('phatntt1999@gmail.com', 'SunBookingSystem')
                ->greeting('Hi, ' . $this->data['booked_user_name'])
                ->line('Your ' . $this->data['tour_name'] . ' tour booking has been approved!')
                ->line('Your tour will happened on ' . $this->data['booking_start_date'])
                ->action('Click on this link to checked your booking status!', 'http://127.0.0.1:8000/tours')
                ->line('Thank you for using our application!');
        } else {
            return (new MailMessage)
                ->error()
                ->from('phatntt1999@gmail.com', 'SunBookingSystem')
                ->greeting('Hi, ' . $this->data['booked_user_name'])
                ->line('Your ' . $this->data['tour_name'] . ' tour booking has been rejected, because of some conditions!')
                ->line('Please pick up another tour to enjoy our services!')
                ->action('Click on this link to checked your other booking status!', 'http://127.0.0.1:8000/tours')
                ->line('Thank you for using our application!');
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => $this->data['tour_name'] . ' was be rejected.',
            'content' => 'Your' . $this->data['tour_name'] . ' has been rejected ' . $this->data['tour_name']
                . ' because of some conditions '
        ];
    }
}
