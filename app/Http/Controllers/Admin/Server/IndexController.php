<?php

namespace App\Http\Controllers\Admin\Server;

use App\Http\Controllers\Controller;
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {

        return view('admin.server.index');

    }
}
