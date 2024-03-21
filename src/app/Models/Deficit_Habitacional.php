<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deficit_Habitacional extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'deficit_habitacionais';

    protected $fillable = [
        'created_at'
    ];
}
