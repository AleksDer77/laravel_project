<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_date', 'delivery_addr', 'user_id',
    ];

    public function user(): Relation
    {
        return $this->belongsTo(User::class);
    }

}
