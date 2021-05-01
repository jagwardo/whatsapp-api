<?php

namespace App\Messages;

use Illuminate\Support\Facades\Http;

abstract class AbstractGateway
{

    /**
     * Initiate paramaters for a whatsapp message.
     * @param $contact is the person that receives the message.
     * @param $business_no is the number used to send a message
     * to a contact.
     * @param $text content of the message.
     * @param $headers url headers containing API keys.
     * @param $httpClient GuzzleHttp\Client.
     * @return void
     */
    private $contact;
    private $business_no;
    private $text;
    private static $url;
    private static $headers;
    private static $httpClient;

    public function _construct($contact, $text){
        $this->$contact = $contact;
        $this->$business_no = env('WHATSAPP_BUSINESS_NUMBER');
        self::$url = env('WA_PROVIDER_URL');
        self::$headers = ["Authorization" => "Basic " . base64_encode(env('WA_PROVIDER_API_KEY') . ":" . env('WA_PROVIDER_API_SECRET'))];
        self::$client = new GuzzleHttp\Client();
    }
    
    abstract public function send(); // this implementation sends a message depending on what service we are using (whatsapp, telegram viber...etc)

    abstract public function save(); // save the message and its status, if message fails then log it for another try later

}