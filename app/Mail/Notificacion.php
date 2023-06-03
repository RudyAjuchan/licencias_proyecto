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
    public $cliente;
    public $total;

    use Queueable, SerializesModels;

    public $subject = "Compra Licencia Finalizada";
    /**
     * Create a new message instance.
     */
    public function __construct($total_venta, $nom_cliente)
    {
        $this->cliente=$nom_cliente;
        $this->total=$total_venta;

    }

    public function build(){
        $cliente= $this->cliente;
        $total=$this->total;
        return $this->view('emails.respuesta', compact('cliente', 'total'));
    }
}
