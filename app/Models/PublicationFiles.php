<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicationFiles extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'publication_files';

    public function publication()
    {
        return $this->hasOne(Publication::class, 'publication_id', 'id');
    }
}
