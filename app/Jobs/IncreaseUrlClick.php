<?php

namespace App\Jobs;

use App\Services\UrlService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;


class IncreaseUrlClick implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected string $slug)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(UrlService $urlService): void
    {
        $urlService->increaseClick($this->slug);
    }
}
