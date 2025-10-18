<?php

namespace App\Services;

use App\Models\Url;
use Illuminate\Support\Facades\Log;

class UrlService
{
  public function __construct(protected Url $url) {}

  public function generateBackHalf()
  {
    $backHalf = "";
    $countBackHalf = 0;

    do {
      $backHalf = str()->random(7);
      Log::error("backhalf $backHalf");

      $countBackHalf = $this->url->where('back_half', $backHalf)->count();

      Log::error("currentBackHalf ".$countBackHalf);
    } while($countBackHalf > 0);

    return $backHalf;
  }

  public function handleRedirect($slug)
  {
    $url = $this->url->where('back_half', $slug)->first();

    if ($url) {
      $redirectUrl = $url->destination_url;
      $url->clicks++;
      $url->save();
    }

    return $redirectUrl ?? null;
  }
}