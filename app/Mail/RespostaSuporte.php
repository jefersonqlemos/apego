<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Suporte;

class RespostaSuporte extends Mailable
{
    use Queueable, SerializesModels;

    protected $suporte;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Suporte $suporte)
    {
        //
        $this->suporte = $suporte;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.respostasuporte')->with([
            'nome' => $this->suporte->nome,
            'mensagem' => $this->suporte->mensagem,
            'resposta' => $this->suporte->resposta,
        ]);
    }
}
