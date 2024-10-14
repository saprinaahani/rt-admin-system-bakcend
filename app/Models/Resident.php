<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'id_photo',
        'status',
        'phone_number',
        'is_married',
        'house_id', // Foreign key to the house
    ];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
