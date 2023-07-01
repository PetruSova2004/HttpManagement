<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Url;
use App\Models\User;
use App\Services\Response\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data = DB::table('urls')
            ->join('users', 'urls.user_id', '=', 'users.id')
            ->select('urls.id', 'urls.original_url', 'urls.short_url', 'urls.views', 'users.name')
            ->get();
        return ResponseService::sendJsonResponse(true, 200, [], [
            'data' => $data,
        ]);
    }
}
