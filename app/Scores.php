<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    protected $table = 'scores';
    protected $fillable = [
        'scores', 'exam_id', 'id',
    ];
}
