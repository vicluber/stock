<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * Get the items associated with the image.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
