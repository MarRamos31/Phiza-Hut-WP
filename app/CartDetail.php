<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //
    public function JoinCart ()
    {
        return $this->hasMany(Cart::class);
    }
    protected $table = 'cartdetail';
}
