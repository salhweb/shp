<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
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
        return parent::report($e);
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
        if($this->isHttpException($e)){
            switch ($e->getStatusCode()) {
                case '404':
                            \Log::error($e);
        
\Response::view('errors.404',array('foo'=>'bar'),404);
                     
                break;

                case '500':
                    \Log::error($exception);
return response()->view('layouts/index', [
                    'content' => view('errors/404')
                ]);
                       // return \Response::view('errors.500');   
                break;

                default:
                    return $this->renderHttpException($e);
                break;
            }
        }
        else
        {
            return parent::render($request, $e);
        }


        return parent::render($request, $e);
    }

}
