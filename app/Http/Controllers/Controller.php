<?php

namespace Numencode\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Authenticated user implementation.
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->user = Auth::user();

        view()->share('user', $this->user);
        view()->share('signedIn', (bool)Auth::check());
    }
}
