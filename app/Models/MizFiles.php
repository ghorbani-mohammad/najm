<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MizFiles extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'miz_files';

    public function session()
    {
        return $this->hasOne(MizSession::class, 'session_id', 'id');
    }


}
