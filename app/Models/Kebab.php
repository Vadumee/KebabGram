<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebab extends Model {
    protected $table = 'kebabs';
    protected $primaryKey = 'kebab_id';

    protected $fillable = [
        'kebab_pic_link',
        'kebab_description',
    ];
}



 ?>
