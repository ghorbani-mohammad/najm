<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoshaverElmi extends Model
{
    use HasFactory;

    protected $table = 'moshaver';

    public function publication()
    {
        return $this->hasOne(Publication::class, 'id', 'publication_id');
    }
}
