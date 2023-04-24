<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinOurNetworkStep0 extends Model
{
    use HasFactory;

    protected $table = 'join_our_network';

    public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
    }

    public function getTextAttribute() 
    {
        return $this->{ 'text_'.App::getLocale() };
    }
}
