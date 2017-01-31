<?php

namespace Numencode\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Numencode\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Numencode\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Numencode\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'            => \Numencode\Http\Middleware\Authenticate::class,
        'auth.basic'      => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings'        => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can'             => \Illuminate\Auth\Middleware\Authorize::class,
        'throttle'        => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'isAdmin'         => \Admin\Http\Middleware\IsAdmin::class,
        'permission'      => \Admin\Http\Middleware\CheckPermission::class,
        'isGuest'         => \Cms\Http\Middleware\IsGuest::class,
        'isAuthenticated' => \Cms\Http\Middleware\IsAuthenticated::class,
        'localization'    => \Cms\Http\Middleware\Localization::class,
    ];
}
