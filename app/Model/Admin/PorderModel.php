<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PorderModel extends Model
{
    public $table = 'p_order';
    public $primaryKey = 'order_id';
    public $timestamps = false;
}
