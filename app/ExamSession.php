<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSession extends Model
{
    protected $table = 'session';
    protected $fillable = [
        'exam_name', 'time', 'id', 'data'
    ];
}
