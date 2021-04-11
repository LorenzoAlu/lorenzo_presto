<?php

namespace App\Mail;

use App\Models\Announcement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactDailyUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $bag;
    public function __construct($bag)
    {
        $this->bag=$bag;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $announcements=Announcement::orderBy('id','desc')->take(5)->get();
        $user=Auth::all();
        return $this->from('presto@presto.it')
                    ->view('contacts.newsletter',compact('announcements','user'));
      
    }
}
