<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof TokenExpiredException) {
            return response()->error('token_expired', Response::HTTP_UNAUTHORIZED);
        } else if ($exception instanceof TokenInvalidException) {
            return response()->error('token_invalid', Response::HTTP_UNAUTHORIZED);
        } elseif ($exception instanceof PermissionDeniedException) {
            return response()->error($exception->getMessage(), $exception->getCode());
        }

        if ($this->isHttpException($exception) && strpos(request()->getRequestUri(), '/admin') !== false) {
            return response()->view('admin.errors.' . $exception->getStatusCode());
        }

        return parent::render($request, $exception);
    }
}
