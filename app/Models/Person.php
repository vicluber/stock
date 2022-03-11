<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the person.
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
