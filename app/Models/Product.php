<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $description
 * @property string $image
 * @property int $calories
 * @property int $cost
 */

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 'cost', 'description',
      'calories', 'image',
    ];

}
