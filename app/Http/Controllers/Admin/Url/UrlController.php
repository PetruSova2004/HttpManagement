<?php

namespace App\Http\Controllers\Admin\Url;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        return view('Admin.URL.index');
    }
}
