<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesttController extends Controller
{
    public function index()
    {
        return view('main');
    }
}
