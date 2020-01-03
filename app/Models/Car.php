<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'model', 'color', 'license_plate', 'num_doors', 'max_speed', 'type_id'
    ];

    public function type()
    {
       $this->belongsTo(Type::class);
    } # End method type

} # End class Car
