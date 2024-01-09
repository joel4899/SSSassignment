<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['model', 'year', 'salesperson_email', 'manufacturer_id'];

    public function manufacturer()
    {
        // Assuming your foreign key on the 'cars' table is 'manufacturer_id'
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
}
