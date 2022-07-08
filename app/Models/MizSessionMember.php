<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MizSessionMember extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'madrak', 'sazman_matbooe','tarikh_pardakht', 'haghozzahme', 'role'];

}
