<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsLogoutController extends Controller
{
    public function store () {
        auth()->logout();
        return redirect()->route('home');
    }
}
