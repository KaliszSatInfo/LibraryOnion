<?php

namespace App\Controllers;

use App\Models\ModelBook;

class ControllerBooks extends BaseController
{
    var $modelBook;
    var $config;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->modelBook = new ModelBook();
    }


    public function loadBooks()
    {
        $itemsPerPage = $this->config->itemsPerPage;
        $data['books'] = $this->modelBook->paginate($itemsPerPage);
        $data['pager'] = $this->modelBook->pager;
        return view('books/ViewBooks', $data);
    }
}
