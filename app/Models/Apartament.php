<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartament extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['address','city', 'postal_code', 'rented_price', 'rented', 'user_id'];

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'platform_apartament', 'apartament_id', 'platform_id')->withPivot('register_date', 'premium');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
