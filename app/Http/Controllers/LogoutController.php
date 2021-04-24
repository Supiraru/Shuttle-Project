<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function store(){
        auth()->logout();
        return redirect()->route('global')->with('success', 'Logout Success');
    }
}
