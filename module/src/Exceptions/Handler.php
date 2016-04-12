<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/04/12
 * Time: 16:30
 */

namespace Chatbox\Connpass\Exceptions;

use Chatbox\Connpass\Http\ResponseTrait;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    use ResponseTrait;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if($e instanceof HttpException){
            return $this->response([
                "status" => "BAD",
                "message" => "not found"
            ],404);
        }else{
            return $this->response([
                "status" => "BAD",
                "message" => "whoops, something wrong",
                "hoge" => $e->getMessage()

            ],500);
        }
    }
}
