<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    /**
     * Get the reviews of the apartment.
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    /**
     * Get the user that added the apartment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}




// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class apartment extends Model
// {
//     use HasFactory;
// }
