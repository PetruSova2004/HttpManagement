<?php

namespace App\Http\Controllers\Pub\Url;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        return view('Pub.URL.index');
    }

    public function store()
    {
        return view('Pub.URL.store');
    }

    public function storeCustom()
    {
        return view('Pub.URL.custom_store');
    }

}
