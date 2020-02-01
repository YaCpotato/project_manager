<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleCalendarService extends Facade
{
    protected static function getFacadeAccessor() {
        return 'GoogleCalendarService';
    }
}