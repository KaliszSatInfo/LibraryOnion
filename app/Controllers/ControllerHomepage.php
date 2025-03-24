<?php

namespace App\Controllers;

use App\Libraries\LibraryHomepage;

class ControllerHomepage extends BaseController
{
    var $library;

    public function __construct()
    {
        $this->library = new LibraryHomepage();
    }

    public function loadHomepage()
    {
        $data['items'] = $this->library->getBookAuthors();
        return view('ViewHomepage', $data);
    }
}
