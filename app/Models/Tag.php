<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    protected $table = 'tag';
    protected $primaryKey = 'kebab_id';

    protected $fillable = [
        'tag_text',
    ];
}



 ?>
