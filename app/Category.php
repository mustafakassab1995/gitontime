<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'title', 'url', 'description', 'image_id', 'cover_id', 'file_id', 'module', 'parent', 'created_by', 'created_at', 'updated_by', 'updated_at', 'time'
    ];
}
