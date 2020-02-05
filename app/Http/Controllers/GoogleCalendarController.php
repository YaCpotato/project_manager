<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\GoogleCalendar\Event;

use GoogleCalendarService;

class GoogleCalendarController extends Controller
{
    public function __construct()
    {
        $this->GoogleCalendarService = new GoogleCalendarService();
    }

    public function index()
    {
        $events = Event::get();
        return view('calendar/index', compact('events'));
    }

    public function import()
    {
        $event = new Event;
        $events = Event::get();
        foreach($events as $event){
            $this->GoogleCalendarService::import($event->name,$event->startDateTime,$event->endDateTime);
        }
    }
    
}