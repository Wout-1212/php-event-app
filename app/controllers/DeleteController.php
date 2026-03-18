<?php

namespace App\Controllers;

use Core\Session;
use App\Controllers\BaseController;
use App\Models\Event;

class DeleteController extends BaseController
{
    public function delete(int $id = null)
    {
        /**
         * Check if the ID is empty
         */
        if (empty($id)) {
            Session::set('error', 'Something went wrong, please try again.');
            redirect('/');
        }

        /**
         * Find the contact by ID and delete it by giving it a date
         */
        $contact = Event::where('id', $id)->get();
        $contact->deleted_at = date('Y-m-d H:i:s');
        $contact->save();

        /**
         * Set a success message and redirect to the homepage
         */
        Session::set('msg', 'Contact deleted successfully.');
        redirect('/');
    }

}