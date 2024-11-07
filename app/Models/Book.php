<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function __construct($obj){
        $this->isbn = $obj['isbn'];
        $this->title = $obj['title'];
        $this->subtitle = $obj['subtitle'];
        $this->author = $obj['author'];
        $this->publisher = $obj['publisher'];
        $this->year = $obj['year'] ?? '';
        $this->published = $obj['published'];
        $this->pages = $obj['pages'];
        $this->description = $obj['description'];
        $this->image = $obj['image'];
        $this->price = $obj['price'];
        $this->updateDate = $obj['updateDate'];
    }

    public function toArray()
    {
        return [
            "isbn" => $this->isbn,
            "title" => $this->title,
            "subtitle" => $this->subtitle,
            "author" => $this->author,
            "publisher" => $this->publisher,
            "year" => $this->year,
            "published" => $this->published,
            "pages" => $this->pages,
            "description" => $this->description,
            "image" => $this->image,
            "price" => $this->price,
            "updateDate" => $this->updateDate,
        ];
    }
}
