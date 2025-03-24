<?php

namespace App\Controllers;

use App\Models\ModelBook;

class ControllerBooks extends BaseController
{
    var $modelBook;

    public function __construct()
    {
        $this->modelBook = new ModelBook();
    }

    public function loadBooks()
    {
        $data['books'] = $this->modelBook->findAll();
        return view('ViewBooks', $data);
    }
}
