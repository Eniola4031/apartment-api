<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    /**
     * Get the apartment that owns the review.
     */
    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment');
    }

    /**
     * Get the user that made the review.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}



// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class review extends Model
// {
//     use HasFactory;
// }
