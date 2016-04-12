<?php
namespace Chatbox\Connpass\Repository;

use GuzzleHttp\Client;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/04/12
 * Time: 16:09
 */
class ConnpassRepository
{

    public function get(array $query)
    {
        $client = new Client();
        $res = $client->request('GET', 'http://connpass.com/api/v1/event/',[
            "query" => $query
        ]);
//        echo $res->getStatusCode();
// 200
//        echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
        return  json_decode($res->getBody()->getContents(),true);
// {"type":"User"...'
    }

}