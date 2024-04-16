<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('files:process')->withoutOverlapping()->cron('0 0 * * *'); // every day at 00:00