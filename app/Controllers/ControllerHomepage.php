<?php

namespace App\Controllers;

use App\Libraries\LibraryHomepage;

class ControllerHomepage extends BaseController
{
    var $library;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->library = new LibraryHomepage();
    }

    public function loadHomepage()
    {
        $data['items'] = $this->library->getBookAuthors();
        return view('ViewHomepage', $data);
    }
}
