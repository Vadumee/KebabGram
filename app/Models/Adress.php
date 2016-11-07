<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model {
    protected $table = 'adresses';
    protected $primaryKey = 'kebab_id';

    protected $fillable = [
        'shop_name',
        'country',
        'city',
        'street',
        'street_number',
    ];
}



 ?>
