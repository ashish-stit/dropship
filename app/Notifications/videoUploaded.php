<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class videoUploaded extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @return void
     */
    public function __construct($userid)
    {
        $this->user = $userid;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    /*email message activated after regestration for login*/
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Video Uploaded')
            ->greeting(sprintf('Hi, %s', $this->user->name ))
            ->line('We just want to tell you that your ordered video has been completed . You can check to your dashboard .')
//            ->line( 'Your Email : ' .$this->user->email)            
            ->action('Login', route('login'))            
            ->line('Thank you for using our application video editing!');
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
            //
        ];
    }
}
