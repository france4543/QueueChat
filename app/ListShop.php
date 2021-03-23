<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListShop extends Model
{
    protected $fillable = [
        'user_id',
        'name'
    ];
}
