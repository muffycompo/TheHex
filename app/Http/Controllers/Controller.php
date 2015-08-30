<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $loggedInUser;
    protected $loggedInViaRememberMe;
    public function __construct()
    {
        $this->loggedInUser = Auth::User();
        $this->loggedInViaRememberMe = Auth::viaRemember();
        view()->share('isSignedIn',Auth::check());
        view()->share('user',$this->loggedInUser);
    }
}
