<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebab extends Model {
    protected $table = 'kebabs';
    protected $primaryKey = 'kebab_id';
    public $incrementing = false;

      public $incrementing=false; 
    protected $fillable = [
        'kebab_image_path',
        'kebab_image_extension',
        'kebab_description',
    ];
}



 ?>
