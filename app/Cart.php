<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public function JoinPizza ()
    {
        return $this->hasMany(AllPizza::class);
    }
    protected $table = 'cart';

}
