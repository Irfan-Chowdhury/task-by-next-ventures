<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        $env = app()->environment();

        // Handle Forbidden Exception (403)
        if ($exception instanceof HttpException && $exception->getStatusCode() === 403) {
            return response()->json([
                'success' => false,
                'message' => $env === 'local' ? '403 | Unauthorized' : 'Forbidden',
            ], 403);
        }

        // Handle ModelNotFoundException (404)
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => $env === 'local' ? '404 | Resource not found' : 'Not Found',
            ], 404);
        }


        // Default Response for other exceptions
        return parent::render($request, $exception);
    }
}
