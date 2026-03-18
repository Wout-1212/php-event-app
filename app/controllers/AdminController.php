<?php

namespace App\Controllers;

use App\Models\Event;
use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $events = Event::all();

        view('admin', [
            'events'=> $events
        ]);
    }

}
