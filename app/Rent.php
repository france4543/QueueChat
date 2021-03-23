<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Rent extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id',
        'status',
    ];

    public function get_rents_barber()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }

    public function get_rents_member()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
