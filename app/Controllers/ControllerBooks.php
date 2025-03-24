<?php

namespace App\Controllers;

use App\Models\ModelBook;

class ControllerBooks extends BaseController
{
    var $modelBook;
    var $pageConfig;

    public function __construct()
    {
        $this->modelBook = new ModelBook();
        $this->pageConfig = config('App');
    }

    public function loadBooks()
    {
        $itemsPerPage = $this->pageConfig->itemsPerPage;
        $data['books'] = $this->modelAuthor->paginate($itemsPerPage);
        $data['pager'] = $this->modelAuthor->pager;
        return view('ViewBookss', $data);
    }
}
