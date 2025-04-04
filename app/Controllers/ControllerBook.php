<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBook;

class ControllerBook extends BaseController
{
    var $modelBook;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->modelBook = new ModelBook();
    }

    public function loadBook($id)
    {
        $data['book'] = $this->modelBook
            ->select('book.*, 
                GROUP_CONCAT(author.first_name ORDER BY author.first_name) as authors, 
                GROUP_CONCAT(author.last_name ORDER BY author.first_name) as last_names, 
                GROUP_CONCAT(genre.name ORDER BY genre.name) as genres')
            ->join('book_author', 'book_author.book_id = book.id')
            ->join('author', 'author.id = book_author.author_id')
            ->join('book_genre', 'book_genre.book_id = book.id')
            ->join('genre', 'genre.id = book_genre.genre_id')
            ->where('book.id', $id)
            ->groupBy('book.id')
            ->first();

        $this->addBreadcrumb('Books', base_url('books'));
        $this->addBreadcrumb($data['book']->title, base_url('books/').$id); 

        return $this->renderView('books/ViewBook', $data);
    }
}
