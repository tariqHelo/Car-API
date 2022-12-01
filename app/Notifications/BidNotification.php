<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BidNotification extends Notification
{
    use Queueable;

    protected $car;
    protected $user;
    protected $bid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user , $car , $bid)
    {
        $this->car = $car;
        $this->user = $user;
        $this->bid = $bid;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //use sms and notification auth user 
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
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'car' => $this->car,
            'user' => $this->user,
            'bid' => $this->bid,
        ];
    }

    //add to database
    public function toDatabase($notifiable)
    {
        return [
            'data' => 'New Bid Added',
        ];
    }

    //add to sms
    public function toSms($notifiable)
    {
        return (new SmsMessage)
                    ->content('New Bid Added');
    }

}
