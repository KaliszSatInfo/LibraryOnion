<?php

namespace App\Controllers;

use App\Models\ModelAuthor;

class ControllerAuthors extends BaseController
{
    var $modelAuthor;
    var $config;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->modelAuthor = new ModelAuthor();
    }

    public function loadAuthors()
    {
        $itemsPerPage = $this->config->itemsPerPage;
        $data['authors'] = $this->modelAuthor->paginate($itemsPerPage);
        $data['pager'] = $this->modelAuthor->pager;
        return $this->renderView('authors/ViewAuthors', $data);
    }
}