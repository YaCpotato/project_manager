<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\GoogleCalendar\Event;

class GoogleCalendarController extends Controller
{
    public function index(){

      $event = new Event;

      $events = Event::get();

      foreach($events as $event){
        echo $event->name.'';
      }  

    }
    
}