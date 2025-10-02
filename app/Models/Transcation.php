<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingModel;

class Transcation extends Model
{
    use HasFactory;
    protected $table = 'transcations';
    protected $guarded = [];
    public function booking()
    {
        return $this->belongsTo(BookingModel::class, 'booking_id');
    }


}
