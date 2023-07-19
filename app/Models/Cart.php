<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id',
    ];

//    public function user(): Relation
//    {
//        return $this->belongsTo(User::class);
//    }

    public function cartProduct(): Relation
    {
        return $this->hasMany(CartProduct::class);
    }


}
