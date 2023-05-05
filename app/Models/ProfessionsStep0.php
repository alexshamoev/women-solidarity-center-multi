<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionsStep0 extends Model
{
    use HasFactory;

    protected $table = 'professions_step_0';
    

	public function getTitleAttribute() {
        return $this->{ 'title_'.App::getLocale() };
    }


    public function proffesionsStep1()
    {
        return $this->hasMany(ProfessionsStep1::class, 'top_level', 'id')->orderBy('id', 'desc');
    }
}
