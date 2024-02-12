<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QueueMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $client;
    public $nama;
    public $kode_antrian;
    public $no_antrian;
    public $lihatantrian;

    public function __construct($client)
    {
        $this->client = $client;
        $this->nama = $client->nama;
        $this->kode_antrian = $client->service->kode_layanan;
        $this->no_antrian = $client->no_antrian;
        $this->lihatantrian = 'https://timurbersinar.com/antrian/lihat/'.$client->location->id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Antrian LPSPL Sorong',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'user.antrian.emailantrian',
            with: [
                'nama' => $this->nama,
                'no_antrian' => $this->no_antrian,
                'kode_antrian' => $this->kode_antrian,
                'lihatantrian' => $this->lihatantrian,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
