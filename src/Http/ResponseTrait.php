<?php
namespace Chatbox\Connpass\Http;
use Illuminate\Http\JsonResponse;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/04/12
 * Time: 16:31
 */
trait ResponseTrait
{
    public function response($data=[],$status=200,$headers=[]):JsonResponse
    {
        return JsonResponse::create($data,$status,$headers);
    }

}