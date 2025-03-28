<?php

namespace App\Controllers;

use App\Models\ModelAuthor;
use Psr\Log\LoggerInterface;

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
        return view('ViewAuthors', $data);
    }
}
