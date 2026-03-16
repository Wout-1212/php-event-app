<?php

namespace App\Controllers;

use Core\Session;
use App\Models\Event;
use App\Controllers\BaseController;

class Savecontroller extends BaseController
{
    public function save(int $id = null)
    {
        if (empty($id)) { // id is empty, create new event
            $event = new Event();
            $event->title = get('title');
            $event->description = get('description');
            $event->location = get('location');
            $event->date = get('date');
            $event->time = get('time');
            $event->user_id = Session::get('user_id');
            $event->save();
        }

        if (!empty($id)) { // id is not empty, update existing event
            $event = Event::where('id', $id)->first();
            $event->title = get('title');
            $event->description = get('description');
            $event->location = get('location');
            $event->date = get('date');
            $event->time = get('time');
            $event->save();
        }

        Session::set('message', 'Event saved successfully');
        redirect('/');
    }
}
