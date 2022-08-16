<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * report
     */
    public function report(Throwable $e): void
    {
        parent::report($e);
    }

    /**
     * render
     */
    public function render($request, Throwable $e): Response
    {
        return parent::render($request, $e);
    }

    /**
     * HTTP以外の例外発生時の処理
     */
    protected function prepareResponse($request, Throwable $e): Response
    {
        // HTTPでない例外が起これば、HTTP例外の500に変更する
        if (!$this->isHttpException($e) && !config('app.debug')) {
            $e = new HttpException(500, $e->getMessage(), $e);
        }

        return parent::prepareResponse($request, $e);
    }

    /**
     * HTTP例外発生時の処理
     */
    protected function renderHttpException(HttpExceptionInterface $e): Response
    {
        $status = $e->getStatusCode();

        return response()->view(
            'errors.common',
            [
                'exception' => $e,
                'message' => $e->getMessage(),
                'status_code' => $status,
            ],
            $status,
            $e->getHeaders()
        );
    }
}
