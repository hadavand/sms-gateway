<?php

namespace Hadavand\SmsGateway;

interface SmsGatewayInterface
{
    public function send($message, $receptor);
}