<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    function categories(){
        return $this->belongsTo(Category::class);
    }
    function mcq(){
        return $this->hasMany(Mcq::class);
    }
}
