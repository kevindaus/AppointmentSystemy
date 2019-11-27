<?php


namespace App\Notifier;


use App\NotificationHistory;
use mysql_xdevapi\Exception;
use Semaphore\SemaphoreClient;

class DuePaymentSMSNotifier
{
    public $recipient = '';
    public $subject = '';
    public $message = '';
    public $raw_response = '';
    /**
     * @var SemaphoreClient
     */
    private $client;
    /**
     * @var $api_key string
     */
    private $api_key;

    /**
     * DuePaymentSMSNotifier constructor.
     */
    public function __construct()
    {
        $this->api_key = setting()->get('YOUR_API_KEY');
    }

    public function send()
    {
        $ch = curl_init();
        $parameters = array(
            'apikey' => $this->api_key, //Your API KEY
            'number' => $this->recipient,
            'message' => $this->message,
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
        $notificationHistory = new NotificationHistory();
        $notificationHistory->recipient = $this->recipient;
        $notificationHistory->response = $output;
        $notificationHistory->save();
        return $output;
    }

    public function setMessage($messageTemplate)
    {
        $this->message = $messageTemplate;
    }

    public function setRecipient($mobile_number)
    {
        $this->recipient = $mobile_number;
    }

}
