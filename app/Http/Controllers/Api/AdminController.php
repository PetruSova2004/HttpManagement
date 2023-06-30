<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Url;
use App\Models\User;
use App\Services\Response\ResponseService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getUsers()
    {
        $users = User::all();
        return ResponseService::sendJsonResponse(true, 200, [], [
            'data' => $users,
        ]);
    }

    public function getUrls()
    {
        $urls = Url::all();
        return ResponseService::sendJsonResponse(true, 200, [], [
            'data' => $urls,
        ]);
    }
}
