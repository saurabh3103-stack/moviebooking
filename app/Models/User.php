<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Transcation;
use App\Models\Movie;
use App\Models\BookingModel;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
    public function transaction()
    {
        return $this->hasOne(Transcation::class, 'booking_id');
    }
        public function bookings()
    {
        return $this->hasMany(BookingModel::class, 'user_id');
}
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
