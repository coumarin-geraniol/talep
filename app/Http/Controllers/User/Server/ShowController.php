<?php

namespace App\Http\Controllers\User\Server;

use App\Http\Controllers\Controller;
class ShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke()
    {
        return view('user.server.index');
    }
}
