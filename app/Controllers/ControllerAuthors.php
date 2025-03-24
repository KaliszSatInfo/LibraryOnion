<?php

namespace App\Controllers;

use App\Models\ModelAuthor;

class ControllerAuthors extends BaseController
{
    var $modelAuthor;

    public function __construct()
    {
        $this->modelAuthor = new ModelAuthor();
    }

    public function loadAuthors()
    {
        $data['authors'] = $this->modelAuthor->findAll();
        return view('ViewAuthors', $data);
    }
}
