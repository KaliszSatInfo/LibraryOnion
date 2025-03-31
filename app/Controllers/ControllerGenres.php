<?php

namespace App\Controllers;

use App\Models\ModelGenre;

class ControllerGenres extends BaseController
{
    var $modelGenre;
    var $config;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->modelGenre = new ModelGenre();
    }

    public function loadGenres()
    {
        $genresPerpage = $this->config->genresPerpage;
        $data['genres'] = $this->modelGenre->orderBy('name', 'asc')->paginate($genresPerpage);   
        $data['pager'] = $this->modelGenre->pager;
        return $this->renderView('genres/ViewGenres', $data);
    }
}