<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Response\ResponseService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showView()
    {
        return view('Admin.User.index');
    }
}
