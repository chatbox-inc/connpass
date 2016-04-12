<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/04/12
 * Time: 16:13
 */

namespace Chatbox\Connpass;

use Chatbox\Connpass\Http\ResponseTrait;

use Chatbox\Connpass\Repository\ConnpassRepository;
use Illuminate\Support\ServiceProvider;

use Laravel\Lumen\Application as Lumen;

class ConnpassServiceProvider extends ServiceProvider
{
    use ResponseTrait;

    public function register()
    {
        if($this->app instanceof Lumen){
            $this->registerRoute($this->app);
        }else{
            \Route::group([],function($router){
                $this->registerRoute($router);
            });
        }
    }

    protected function registerRoute($router){
        $prefix = $_SERVER["REQUEST_URI"];
        $self = $this;
        $router->get("$prefix",function(
            ConnpassRepository $repository
        )use($self){
            $list = $repository->get();
            return $self->response([
                "status" => "OK",
                "event" => $list["events"]??[]
            ]);
        });
    }




}