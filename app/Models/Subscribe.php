<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $connection = 'external_db';

    protected $table = 'subscribers';

    protected $fillable = [
        'email',
        'active_status',
    ];
}