<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MovieCategory;
use App\Models\Theater;
use App\Models\User;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies';
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(MovieCategory::class, 'category_id');
    }
    public function theater() {
        return $this->belongsTo(Theater::class, 'theater_id');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

}

