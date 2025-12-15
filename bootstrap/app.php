<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Helpers\ResponseHelper;
use App\Models\User;
use Kreait\Firebase\Exception\Messaging\NotFound;
use Kreait\Firebase\Exception\Messaging\InvalidMessage;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withExceptions(function (Exceptions $exceptions) {

        /**
         * 🔴 Model not found
         * Route Model Binding / findOrFail
         */
        $exceptions->render(function (ModelNotFoundException $e) {
            return ResponseHelper::jsonResponse(
                null,
                class_basename($e->getModel()) . ' Not Found',
                404,
                false
            );
        });

        /**
         * 🔴 General 404 (routes / resources)
         */
        $exceptions->render(function (NotFoundHttpException $e) {
            $model = 'Model';

            if (preg_match('/model \[([^\]]+)\]/', $e->getMessage(), $matches)) {
                $model = class_basename($matches[1]);
            }
            return ResponseHelper::jsonResponse(
                null,
                "{$model} Not Found",
                404,
                false
            );
        });

        /**
         * 🔴 HttpResponseException
         */
        $exceptions->render(function (HttpResponseException $e) {
            return ResponseHelper::jsonResponse(
                null,
                $e->getMessage(),
                $e->getStatusCode() ?: 400,
                false
            );
        });

        /**
         * 🔴 Firebase exceptions
         */
        $exceptions->render(function (NotFound|InvalidMessage $e) {

            $user = User::find(auth()->id());
            $super = User::whereHas('role', fn($q) => $q->where('role', 'super_admin'))->first();

            return ResponseHelper::jsonResponse(
                null,
                "Requested Firebase entity was not found. Please check the provided data (fcm_token's).
user->fcm_token={$user?->fcm_token},
super_admin->fcm_token={$super?->fcm_token}",
                404,
                false
            );
        });
    })

    ->withMiddleware(function (Middleware $middleware) {
        // لا شيء هنا حاليًا
    })

    ->create();
