<?php
namespace App\Helpers;

class ApiFetch{
    public static function request($method, $url) {

        $client = new \GuzzleHttp\Client();
        $res = $client->request($method, $url);

        $code = $res->getStatusCode();

        if($code != 200)
            return false;

        return $res;

    }
}
