<?php

namespace App\Http\Controllers;

use App\Jobs\IncreaseUrlClick;
use App\Services\UrlService;
use Illuminate\Contracts\Cache\Repository;

class PublicController extends Controller
{
    public function __construct(protected UrlService $urlService, protected Repository $cache) {}

    public function redirect($slug)
    {
        $cacheKey = "slug:$slug";

        $redirectUrl = $this->cache->get($cacheKey);

        if (!$redirectUrl) {
            $redirectUrl = $this->urlService->handleRedirect($slug);
        }

        if (empty($redirectUrl)) {
            abort(404); 
        }

        IncreaseUrlClick::dispatch($slug)->afterResponse();

        return redirect($redirectUrl);
    }
}
