<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //

     protected $fillable = [
       'file_name', 'title', 'mime_type', 'size', 'created_by', 'updated_by'
    ];
    
}
