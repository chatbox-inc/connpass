<?php
namespace Chatbox\Connpass;

use Chatbox\Connpass\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/04/12
 * Time: 16:06
 */
class Application extends \Laravel\Lumen\Application
{
    static public function boot(){
        $app = new static();

        $app->singleton(ExceptionHandler::class,Handler::class);

        $app->register(ConnpassServiceProvider::class);

        $app->run();
    }

}