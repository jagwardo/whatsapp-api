<?php

namespace App\Messages;

use App\Messages\AbstractGateway;
use Illuminate\Support\Facades\Http;

class WhatsAppGateway extends AbstractGateway
{


    public function send()
    {

    /**
     * Public function that sends whatsapp messages through gateway provider
     * @return httpResponse
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