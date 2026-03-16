<?php

namespace App\Controllers;

use App\Models\Event;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $events = Event::all();

        view('home', [
            'events'=> $events
        ]);
    }

}
