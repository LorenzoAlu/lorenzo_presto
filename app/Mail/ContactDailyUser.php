<?php

namespace App\Mail;

use App\Models\Announcement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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

        return $this->from('presto@presto.it')
                    ->view('contacts.newsletter',compact('announcements'));
      
    }
}
