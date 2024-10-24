<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeacherCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $teacher;
    public $password;

    /**
     * Create a new message instance.
     *
     * @param $teacher
     * @param $password
     */
    public function __construct($teacher, $password)
    {
        $this->teacher = $teacher;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to your Account')
            ->view('emails.teacher-created');
    }
}
