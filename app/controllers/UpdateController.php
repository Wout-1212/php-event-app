<?php

namespace App\Controllers;

use App\Models\Contact;
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
        $contact = Event::where('id', $id)->get();

        if($contact && !is_null($contact->deleted_at)) { // als contact gedelete is, niet tonen
            Session::set('error', 'Contact not found.');
            redirect('/');
        }

        /**
         * Load the view file
         */
        view('update', compact('contact'));
    }

}