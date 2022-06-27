<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productstore extends Model {

    use HasFactory;

//    protected $table = "productstores";
    protected $fillable = [
        'prostoreid',
        'suppid',
        'catname',
        'barcode',
        'productid',
        'qunatity',
        'price',
        'sale',
        'subtotal',
        'proentime',
        'proendate',
        'proenmonth',
        'prostatus',
    ];

}
