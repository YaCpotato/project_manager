<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\GoogleCalendar\Event;

class GoogleCalendarController extends Controller
{
    public function index(){

      $event = new Event;

      $events = Event::get();
      //exit(var_dump($events));

      foreach($events as $event){
        echo $event->name.'\n';
        echo $event->location.'\n';
        echo $event->startDateTime.'\n';
        echo $event->endDateTime.'\n';
      }  

    }
    
}