<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lectures extends Model
{
    use HasFactory;
    protected $fillable = ['lecName', 'lecUrl', 'course_id'];

    public function course(){
        return $this->belongsTo('App\Models\courses');
    }

    public function quiz (){
        return $this->hasMany('App\Models\quizs');
    }
}
