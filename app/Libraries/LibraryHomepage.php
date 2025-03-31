<?php

namespace App\Libraries;

use App\Models\ModelBook;

class LibraryHomepage
{
    var $modelBook;

    public function __construct()
    {
        $this->modelBook = new ModelBook();
    }

    public function getBookAuthors()
    {
        return $this->modelBook
        ->select('book.*, 
                GROUP_CONCAT(CONCAT(author.first_name, " ", author.last_name) SEPARATOR ", ") as authors,
                GROUP_CONCAT(author.portrait_image SEPARATOR ", ") as portrait_images')
        ->join('book_author', 'book_author.book_id = book.id')
        ->join('author', 'author.id = book_author.author_id')
        ->groupBy('book.id')
        ->orderBy('RAND()')
        ->limit(5)
        ->findAll();
    }
}