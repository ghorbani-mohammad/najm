<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookFiles extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'book_files';

    public function publication()
    {
        return $this->hasOne(Book::class, 'book_id', 'id');
    }}
