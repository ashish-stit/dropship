<?php

namespace App\Models;

use Cohensive\Embed\Facades\Embed;
use Illuminate\Database\Eloquent\Model;

class master_thumbnails_model extends Model
{
      protected $fillable = [
        'thum_video',      
      ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'masterthumnails';
}
