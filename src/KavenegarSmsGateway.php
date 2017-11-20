<?php

namespace Hadavand\SmsGateway;

use Kavenegar;

Class KavenegarSmsGateway implements SmsGatewayInterface
{

    private $sender;

    public function __construct()
    {
        $this->sender = '10004346';
    }

    public function send($message, $receptor)
    {
        return Kavenegar::Send($this->sender, $receptor, $message);
    }
}