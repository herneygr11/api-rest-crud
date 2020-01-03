<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function cars()
    {
        $this->belongsToMany(Car::class)->withTimestamps();

    } # End method cars

} # End class Type
