<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    public function index()
    {
        return view('error.404');
    }
}
