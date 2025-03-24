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
            ->select('book.*, author.first_name, author.last_name, author.portrait_image')
            ->join('book_author', 'book_author.book_id = book.id')
            ->join('author', 'author.id = book_author.author_id')
            ->orderBy('RAND()')
            ->limit(5)
            ->find();
    }
}
