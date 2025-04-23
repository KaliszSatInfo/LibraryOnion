<?php

namespace App\Controllers;

use App\Models\ModelBook;
use App\Models\ModelBookAuthor;
use App\Models\ModelBookGenre;

class ControllerBooks extends BaseController
{
    var $modelBook;
    var $modelBookAuthor;
    var $modelBookGenre;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);

        $this->modelBook = new ModelBook();
        $this->modelBookAuthor = new ModelBookAuthor();
        $this->modelBookGenre = new ModelBookGenre();
    }

    public function loadBooks()
    {
        $this->addBreadcrumb('Books', base_url('books'));

        $itemsPerPage = $this->config->itemsPerPage;
        $data['books'] = $this->modelBook->paginate($itemsPerPage);
        $data['pager'] = $this->modelBook->pager;

        return $this->renderView('books/ViewBooks', $data);
    }

    public function deleteBook($id)
    {
        $book = $this->modelBook->find($id);
        $this->modelBookAuthor->where('book_id', $id)->delete();
        $this->modelBookGenre->where('book_id', $id)->delete();
        $this->modelBook->delete($id);
        return redirect()->to('/books')->with('message', 'Book deleted successfully.');
    }
}