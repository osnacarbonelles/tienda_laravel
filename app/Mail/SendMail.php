<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class SendMail extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $gmail;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($gmail)
    {
        $this->gmail = $gmail;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ha realizado su compra con exito!')
        ->view('mail');
    }
}
