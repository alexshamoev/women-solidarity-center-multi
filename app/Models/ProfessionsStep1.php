<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionsStep1 extends Model
{
    use HasFactory;

    protected $table = 'professions_step_1';


	public function getTitleAttribute() {
        return $this->{ 'title_'.App::getLocale() };
    }
}
