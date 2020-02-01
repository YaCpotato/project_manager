<?php

namespace App\Services;

use App\Schedule;

class GoogleCalendarService
{
    public function import($summary,$startDate,$endDate)
    {
        $schedule = new Schedule;
        $schedule->summary = $summary;
        $schedule->start_date = $startDate;
        $schedule->end_date = $endDate;
        $schedule->save();
        return;
    }
}