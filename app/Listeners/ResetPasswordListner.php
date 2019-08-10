<?php

namespace App\Listeners;

use App\Events\RegisterPasswordEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class ResetPasswordListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisterPasswordEvent  $event
     * @return void
     */
    public function handle(RegisterPasswordEvent $event)
    {
         $data = array('name' => $event->user->name, 'id' =>$event->user->id, 'email' => $event->user->email, 'token' =>$event->user->token, 'body' => 'Welcome to our website. Hope you will enjoy our articles');
         
 
        Mail::send('mail', compact('data'), function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Reset Password');
        });
    }
}
