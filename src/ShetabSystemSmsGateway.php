<?php

namespace Hadavand\SmsGateway;

use SoapClient;
use SoapFault;

Class ShetabSystemSmsGateway implements SmsGatewayInterface
{
    private $sender;

    private $username;

    private $password;

    public function send($message, $receptor)
    {
        $this->sender   = config('sms_gateway.shetab_system.sender');
        $this->username = config('sms_gateway.shetab_system.username');
        $this->password = config('sms_gateway.shetab_system.password');

        ini_set("soap.wsdl_cache_enabled", "0");
        try {
            $client                 = new SoapClient("http://37.228.138.115/post/send.asmx?wsdl");
            $parameters['username'] = $this->username;
            $parameters['password'] = $this->password;
            $parameters['from']     = $this->sender;
            $parameters['to']       = $receptor;
            $parameters['text']     = $message;
            $parameters['isflash']  = true;
            $parameters['udh']      = "";
            $parameters['recId']    = [ 0 ];
            $parameters['status']   = 0x0;

            /*$result = $client->GetCredit([
                "username" => $this->username,
                "password" => $this->password
            ])->GetCreditResult;*/

            return $client->SendSms($parameters)->SendSmsResult;

        } catch (SoapFault $exception) {
            echo $exception->getMessage();

            return false;
        }
    }
}