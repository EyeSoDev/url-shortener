<?php

namespace App\Http\Controllers;

use App\Services\UrlService;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct(protected UrlService $urlService) {}

    public function redirect($slug)
    {
        $redirectUrl = $this->urlService->handleRedirect($slug);

        if (empty($redirectUrl)) {
            abort(404); 
        }

        return redirect($redirectUrl, 301);
    }
}
