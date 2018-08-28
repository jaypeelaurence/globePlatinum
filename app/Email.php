<?php

namespace App;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    public $body;

    function __construct($body){
        $this->body = $body;
    }

    public function build(){
    }
    
    public function sending($subject){
        return $this->subject($subject)->view('main.email');
    }

    public function sendingFile($subject, $fileName){
        return $this->subject($subject)
            ->view('main.email')
            ->attach(public_path() . '/files/' . $fileName, [
                'as' => $fileName,
                'mime' => 'text/csv',
            ]);
    }
}
