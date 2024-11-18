<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function apartaments()
    {
        return $this->belongsToMany(Apartament::class, 'platform_apartament', 'platform_id', 'apartament_id')->withPivot('register_date', 'premium');
    }
}
