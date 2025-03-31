<?php

namespace App\Controllers;

use App\Models\ModelBook;

class ControllerBooks extends BaseController
{
    var $modelBook;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->modelBook = new ModelBook();
    }

    public function loadBooks()
    {
        $this->addBreadcrumb('Books', '/LibraryOnion/books');

        $itemsPerPage = $this->config->itemsPerPage;
        $data['books'] = $this->modelBook->paginate($itemsPerPage);
        $data['pager'] = $this->modelBook->pager;
        return $this->renderView('books/ViewBooks', $data);
    }
}