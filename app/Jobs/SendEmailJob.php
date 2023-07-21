<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $name;
    private $code;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $email, string $name, string $code)
    {
        $this->email = $email;
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = $this->email;
        $code= $this->code;
        $message='Your verification code is '.$code;
        Mail::send([], [], function ($mail) use ($email, $message) {
            $mail->from('astralAttire@gmail.com');
            $mail->to($email);
            $mail->subject('Verification code');
            $mail->text($message); // Add a text part to the email message
        });

    }
}
