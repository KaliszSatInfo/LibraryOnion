<?php

namespace App\Controllers;

use App\Models\ModelBook;
use App\Models\ModelBookAuthor;
use App\Models\ModelBookGenre;
use App\Models\ModelAuthor;
use App\Models\ModelGenre;

class ControllerBooks extends BaseController
{
    var $modelBook;
    var $modelBookAuthor;
    var $modelBookGenre;
    var $modelAuthor;
    var $modelGenre;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);

        $this->modelBook = new ModelBook();
        $this->modelBookAuthor = new ModelBookAuthor();
        $this->modelBookGenre = new ModelBookGenre();
        $this->modelAuthor = new ModelAuthor();
        $this->modelGenre = new ModelGenre();
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

        if ($book) {
            $this->modelBookAuthor->where('book_id', $id)->delete();
            $this->modelBookGenre->where('book_id', $id)->delete();

            $this->modelBook->delete($id);
        }

        return redirect()->to('/books');
    }

    public function newBook()
    {
        $this->addBreadcrumb('Books', base_url('books'));
        $this->addBreadcrumb('Add Book', base_url('books/new'));

        $data['authors'] = $this->modelAuthor->findAll();
        $data['genres'] = $this->modelGenre->findAll();

        return view('books/ViewAddBook', $data);
    }

    public function createBook()
    {
        $postData = $this->request->getPost();

        $newBookId = $this->modelBook->insert([
            'title' => $postData['title'],
            'description' => $postData['description'],
            'published_date' => $postData['published_date'],
            'cover_image' => $postData['cover_image'] ?? null,
            'isbn' => $postData['isbn'] ?? null,
        ], true);

        if (!empty($postData['author_ids'])) {
            foreach ($postData['author_ids'] as $authorId) {
                $this->modelBookAuthor->insert([
                    'book_id' => $newBookId,
                    'author_id' => $authorId
                ]);
            }
        }

        if (!empty($postData['genre_ids'])) {
            foreach ($postData['genre_ids'] as $genreId) {
                $this->modelBookGenre->insert([
                    'book_id' => $newBookId,
                    'genre_id' => $genreId
                ]);
            }
        }

        return redirect()->to('/books');
    }
}