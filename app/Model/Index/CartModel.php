<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    //
    public $table = 'p_cart';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
