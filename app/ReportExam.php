<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportExam extends Model
{
    protected $table = 'report';
    protected $fillable = [
        'exam_id', 'report', 'id', 'created_at'
    ];
}
