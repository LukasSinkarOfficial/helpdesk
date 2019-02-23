<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
    use AuthorizesRequests {
        authorize as protected laravelAuthorize;
    }

    public function authorize($ability, $arguments = [])
    {
        if (!Auth::guard('employee')->check()) {
            $this->laravelAuthorize($ability, $arguments);
        }
    }
}
