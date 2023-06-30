<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Url;
use App\Models\User;
use App\Services\Response\ResponseService;
use App\Services\Url\UrlService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UrlController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new UrlService();
    }

    public function getAllUrls($user_id)
    {
        $user = User::where('id', $user_id)->first();
        if ($user) {
            if ($user->is_admin) {
                $urls = Url::all();
                return ResponseService::sendJsonResponse(true, 200, [], [
                    'urls' => $urls,
                ]);
            } else {
                $urls = Url::where('user_id', $user_id)->get();
                return ResponseService::sendJsonResponse(true, 200, [], [
                    'urls' => $urls,
                ]);
            }
        }
    }

    public function storeUrl(Request $request, $user_id)
    {
        $client = new Client();
        try {
            $client->get($request->original_url);
            // Ссылка корректна и доступна
            $shortUrl = $this->service->makeShortUrl();
            return $this->service->makeOperations($request, $user_id, $shortUrl);
        } catch (\Exception $e) {
            return ResponseService::sendJsonResponse(false, 200, [], [
                'message' => "Error: " . $e->getMessage(),
            ]);
        }
    }

    public function storeCustomUrl(Request $request, $user_id)
    {
        $client = new Client();
        try {
            $client->get($request->original_url);
            // Ссылка корректна и доступна
            $shortUrl = $this->service->makeCustomShortUrl($request);
            if ($shortUrl) {
                return $this->service->makeOperations($request, $user_id, $shortUrl);
            } else {
                throw new \Exception('Your custom url is invalid');
            }

        } catch (\Exception $e) {
            return ResponseService::sendJsonResponse(false, 200, [], [
                'message' => "Error: " . $e->getMessage(),
            ]);
        }
    }

    public function redirectToUrl($id)
    {
        $url = Url::where('short_url', $id)->first();
        if (!request()->is('favicon.ico')) {
            $url->views += 1;
            $url->save();
        }
        return redirect($url->original_url);
    }



}
