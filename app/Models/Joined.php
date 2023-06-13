<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joined extends Model
{
    use HasFactory;
    
    protected $connection = 'external_db';
    
    protected $table = 'joined';

    protected $fillable = [
        'name',
        'last_name',
        'age',
        'proffessions_step_1_top_level=1',
        'proffessions_step_1_top_level=2',
        'work_study_direction',
        'work_study_name',
        'why_want',
    ];
}
