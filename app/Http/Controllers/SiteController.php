<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function mainView()
    {
        return view('layouts.admin_template');
    }
}
