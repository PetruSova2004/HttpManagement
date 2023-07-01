<?php

namespace App\Services\Url;

use App\Http\Controllers\Controller;
use App\Models\Url;
use App\Services\Response\ResponseService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlService extends Controller
{

    public function makeOperations(Request $request, $user_id, $shortUrl)
    {
        $apiPath = env('APP_URL') . "/api/url/";
        $url = $this->storeUrlToDb($request, $user_id, $shortUrl); // Verify if this short url already exists
        if ($url) {
            return ResponseService::sendJsonResponse(true, 200, [], [
                'short_url' => $apiPath . $shortUrl,
            ]);
        } else {
            return ResponseService::sendJsonResponse(false, 200, [], [
                'message' => 'Oops, something goes wrong'
            ]);
        }
    }

    public function storeUrlToDb(Request $request, $user_id, $shortUrl)
    {
        $url = Url::create([
            'original_url' => $request->original_url,
            'short_url' => $shortUrl,
            'user_id' => $user_id,
        ]);

        return $url;
    }
    public function makeShortUrl()
    {
        return uniqid();
    }

    public function makeCustomShortUrl(Request $request)
    {
        $custom_url = $request->custom_url;
        $validator = Validator::make($request->all(), [
            'custom_url' => 'required|unique:urls,short_url|max:255',
        ]);

        if ($validator->fails()) {
            return false;
        } else {
            return $custom_url;
        }
    }
}
