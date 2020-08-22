<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LinkageModel extends Model
{
    protected $table = 'area';
    protected $guarded = []; 
    protected $primaryKey = "id";
    public $timestamps = false;
}
