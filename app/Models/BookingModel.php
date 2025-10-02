<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Transcation;


class BookingModel extends Model
{
    use HasFactory;
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    public function transaction()
    {
        return $this->hasOne(Transcation::class, 'booking_id');
    }
}
