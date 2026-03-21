<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Event;
use Core\Session;

class UpdateController extends BaseController
{
    public function showUpdateForm(int $id)
    {
        /**
         * Find the contact by ID
         */
        $event = Event::where('id', $id)->get();

        if($event && !is_null($event->deleted_at)) { // als event gedelete is, niet tonen
            Session::set('error', 'Event not found.');
            redirect('/');
        }

        /**
         * Load the view file
         */
        view('update', compact('event'));
    }

}