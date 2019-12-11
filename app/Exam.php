<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exam';
    protected $fillable = [
        'exam_name', 'exam_describe', 'id',
    ];
}
