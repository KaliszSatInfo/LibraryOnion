<?php

namespace App\Controllers;

use App\Models\ModelAuthor;

class ControllerAuthors extends BaseController
{
    var $modelAuthor;
    var $pageConfig;

    public function __construct()
    {
        $this->modelAuthor = new ModelAuthor();
        $this->pageConfig = config('App');
    }

    public function loadAuthors()
    {
        $itemsPerPage = $this->pageConfig->itemsPerPage;
        $data['authors'] = $this->modelAuthor->paginate($itemsPerPage);
        $data['pager'] = $this->modelAuthor->pager;
        return view('ViewAuthors', $data);
    }
}
