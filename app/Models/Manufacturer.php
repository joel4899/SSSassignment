<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    // Add relevant model details here
    protected $fillable = ['name', 'address', 'phone'];
    public function cars()
    {
        return $this->hasMany(Car::class, 'manufacturer_id');
    }
}

