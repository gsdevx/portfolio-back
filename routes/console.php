<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schedule;

Schedule::command('report:page_visits:daily')->cron('30 21 * * *');
