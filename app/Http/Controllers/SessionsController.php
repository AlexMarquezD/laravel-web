<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function viewLogin()
    {
        if (!auth()->user()) {
            return view('session.index');
        } else {
            return view('home.index');
        }
    }

    public function destroy()
    {
        auth()->guard('web')->logout();
        return redirect()->to('/');
    }
}
