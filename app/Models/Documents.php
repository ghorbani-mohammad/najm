<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $table = 'documents';

    public function person()
    {
        return $this->hasOne(Personnel::class, 'id', 'person_id');
    }
}
