<?php
/**
 * Created by PhpStorm.
 * User: alvarobanofos
 * Date: 15/1/16
 * Time: 21:51
 */

namespace App\Models;



class GCMSender
{
    public static $apiKey = "AIzaSyBPKEUeFO-0tDTq8hhOHn3BCp2NoYWAoNQ";
    public static $url = 'https://gcm-http.googleapis.com/gcm/send';

    private static $result, $error;

    public static function sendMessage($to, $data = array()) {

        $fields = array(
            "to" => $to,
            'data' => $data
        );

        $headers = array(
            'Authorization: key=' . self::$apiKey,
            'Content-Type: application/json'
        );

        // Open connection
        $ch = curl_init();

        // Set the URL, number of POST vars, POST data
        curl_setopt( $ch, CURLOPT_URL, self::$url);
        curl_setopt( $ch, CURLOPT_POST, true);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields));

        // Execute post
        self::$result = curl_exec($ch);
        self::$error = curl_error($ch);

        // Close connection
        curl_close($ch);

    }

    public static function getResult() {
        return self::$result;
    }

    public static function getError() {
        return self::$error;
    }


}


