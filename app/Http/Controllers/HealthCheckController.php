<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthCheckController extends Controller
{
    public function __invoke()
    {
        session()->put('last_health_check_time', now());
        return true;
    }
}
