<?php

namespace App\Messages;

use Illuminate\Support\Facades\Http;
class WhatsAppGateway
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
    public function send()
    {

    /**
     * Public function that sends whatsapp messages through gateway provider
     * @return httpStatus
     */

        $params = ["to" => ["type" => "whatsapp", "number" => $this->$contact],
            "from" => ["type" => "whatsapp", "number" => self::$business_no],
            "message" => [
                "content" => [
                    "type" => "text",
                    "text" => $this->$text
                ]
            ]
        ];

        $response = $client->request('POST', self::$url, ["headers" => self::$headers, "json" => $this-> $params]);
        $data = $response->getBody();
        $status = $response->getStatusCode();
        if($status!=200){
            echo "error: ". $status;
        }
        else{
            Log::Info($data);
        }
    }

    public function save()
    {
    /**
     * Save the message to app database for logging
     * and other business or techinical purposes.
     * @return MessageModel
     */

     /**
      * Todo
      */
    }

}