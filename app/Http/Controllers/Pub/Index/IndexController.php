<?php

namespace App\Http\Controllers\Pub\Index;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
