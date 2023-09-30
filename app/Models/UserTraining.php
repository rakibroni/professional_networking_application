<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTraining extends Model
{
    use HasFactory;
    protected $table = 'user_training';
    
    protected $fillable = [
        'user_id', 
        'name'
    ];
}
