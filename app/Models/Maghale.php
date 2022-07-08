<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maghale extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'maghale';
    protected $fillable = ['title', 'title_en', 'authors', 'davar', 'haznie_talif', 'haznie_davari', 'haznie_virast', 'haznie_tarjome', 'tarikh_pardakht',
    ];

    public function publication()
    {
        return $this->hasOne(Publication::class, 'id', 'publication_id');
    }
}
