<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'status'];

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
