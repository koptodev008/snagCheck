<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue_images extends Model
{
    use HasFactory;
    
    protected $table = "issue_images";
    
    protected $fillable = ['user_issue_id' , 'image_path' , 'flat_name'];
}
