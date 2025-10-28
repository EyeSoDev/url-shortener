<?php

namespace App\Services;

use App\Models\Url;
use Illuminate\Contracts\Cache\Repository;

class UrlService
{
  public function __construct(protected Url $url, protected Repository $cache) {}

  public function generateBackHalf()
  {
    $backHalf = "";
    $countBackHalf = 0;

    do {
      $backHalf = str()->random(7);

      $countBackHalf = $this->url->where('back_half', $backHalf)->count();

    } while($countBackHalf > 0);

    return $backHalf;
  }

  public function handleRedirect($slug)
  {
    $cacheKey = "slug:$slug";

    // cache 1 hour
    $redirectUrl = $this->cache->remember($cacheKey, 3600, function () use ($slug) {
        return $this->url->where('back_half', $slug)->value('destination_url');
    });

    return $redirectUrl ?? null;
  }

  public function increaseClick($slug) {
    $this->url->where('back_half', $slug)->increment('clicks');
  }

}