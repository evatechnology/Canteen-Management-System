<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prostoreinfo extends Model {

    use HasFactory;

    protected $fillable = [
        'proindate',
        'supplier',
        'category',
        'totalqty',
        'totalamount',
        'extracost',
        'nettotal',
        'paidamount',
        'dueamount',
        'paymethod',
        'acnumber',
        'prointime',
        'proinmonth',
    ];

}
