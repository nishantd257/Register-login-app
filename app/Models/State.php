<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Add fields you want to allow mass assignment

    // A State has many cities
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function profile()
    {
        return $this->hasMany(User::class, 'state');
    }
}
