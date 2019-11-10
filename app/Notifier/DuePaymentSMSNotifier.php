<?php


namespace App\Notifier;


class DuePaymentSMSNotifier
{
    public $recipient = '';
    public $subject = '';
    public $message = '';
    public $raw_response = '';

    /**
     * DuePaymentSMSNotifier constructor.
     */
    public function __construct()
    {

    }

    public function send()
    {
        /* @TODO - send notification  here */
        $this->raw_response = '';
        return true;
    }

    public function setCredential($username_api, $password_api)
    {
        $this->username_api = $username_api;
        $this->password_api = $password_api;
    }

}
