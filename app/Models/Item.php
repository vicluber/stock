<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    /**
     * Get the brand associated with the item.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    /**
     * Get the supplier associated with the item.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    /**
     * Get the product associated with the item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    /**
     * Get the images associated with the item.
     */
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
