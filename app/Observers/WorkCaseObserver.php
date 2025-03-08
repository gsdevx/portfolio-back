<?php

namespace App\Observers;

use App\Models\WorkCase;
use Illuminate\Support\Facades\Cache;

class WorkCaseObserver
{
    public function saved(WorkCase $workCase): void
    {
        Cache::forget('work_cases');
    }
}
