<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Towers extends Model
{
    use HasFactory;
    
    protected $fillable = ['tower_name'];
}
