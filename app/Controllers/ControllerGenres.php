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
    public function addGenre(){
        $file = $this->request->getFile('file');
        if($file->isValid()) /*&& !$file->hasMoved() */{
            $csvData = $this->parseCSV($file->getTempName());
            
            foreach (array_slice($csvData, 1) as $row){
                $this->modelGenre->insert([
                    'name' => $row[0]
                ], true);
            }
        }
         return redirect()->to('/genres');
    }
    private function parseCSV($filePath){
        $rows = [];

        if (($handle = fopen($filePath, 'r')) !== FALSE){
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $rows[] = $data;
            }
            fclose($handle);
        }
        return $rows;
    }
    
}