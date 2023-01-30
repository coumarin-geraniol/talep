<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        return view('user.post.index');
    }
}
