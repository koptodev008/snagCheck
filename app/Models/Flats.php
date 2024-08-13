<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flats extends Model
{
    use HasFactory;

    protected $fillable = ['flat_name' , 'tower_name'];
}
