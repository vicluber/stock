<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    /**
     * Get the items associated with the brand.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
