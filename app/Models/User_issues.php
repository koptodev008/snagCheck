<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_issues extends Model
{
    use HasFactory;

    protected $table = "user_issue";

    protected $fillable = ['category_issue_name' , 'location_name' , 'flat_name' , 'comment' , 'is_verified'];
}
