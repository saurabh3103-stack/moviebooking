<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Theater extends Model
{
    use HasFactory;
    protected $table = 'theaters';
    protected $guarded = [];
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
