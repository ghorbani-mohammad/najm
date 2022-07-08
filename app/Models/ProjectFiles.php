<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectFiles extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'project_files';

    public function project()
    {
        return $this->hasOne(Project::class, 'project_id', 'id');
    }}
