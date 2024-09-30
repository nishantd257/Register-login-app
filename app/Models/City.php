<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'state_id']; // Add fields you want to allow mass assignment

    // A City belongs to a state
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    
    public function profile()
    {
        return $this->hasMany(City::class, 'city');
    }
}
