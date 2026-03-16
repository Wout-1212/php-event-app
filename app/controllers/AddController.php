<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AddController extends BaseController
{
    public function showAddForm()
    {
        /**
         * Load the view file
         */
        view('add');
    }

}