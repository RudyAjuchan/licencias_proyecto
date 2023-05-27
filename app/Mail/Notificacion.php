<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Notificacion extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Compra Licencia Finalizada";
    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    public function build(){
        return $this->view('emails.respuesta');
    }
}
