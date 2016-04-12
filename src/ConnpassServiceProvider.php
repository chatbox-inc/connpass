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
use Illuminate\Http\Request;
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
        $prefix = parse_url($_SERVER["REQUEST_URI"])["path"];
        $self = $this;
        $router->get("$prefix",function(
            ConnpassRepository $repository,
            Request $request
        )use($self){
            $list = $repository->get($request->all());
            return $self->response([
                "status" => "OK",
                "event" => $list["events"]??[]
            ]);
        });
    }




}