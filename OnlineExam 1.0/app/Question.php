<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'quest';
    protected $fillable = [
        'exam_id', 'question','answer','rightAnswer'
    ];
}
