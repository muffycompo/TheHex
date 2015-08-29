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
    public function __construct()
    {
        $this->loggedInUser = Auth::User();
        view()->share('isSignedIn',Auth::check());
        view()->share('user',$this->loggedInUser);
    }
}
