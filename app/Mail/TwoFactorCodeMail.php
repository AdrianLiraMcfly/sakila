<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class TwoFactorCodeMail extends Mailable
{
    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function build()
    {
        return $this->subject('Código de verificación')->view('emails.two_factor_code');
    }
}
