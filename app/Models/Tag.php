<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    protected $table = 'tags';
    protected $primaryKey = 'kebab_id';
    public $incrementing = false;

    protected $fillable = [
        'tag_text',
    ];
}



 ?>
