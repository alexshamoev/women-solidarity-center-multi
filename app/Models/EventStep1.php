<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class EventStep1 extends Model
{
    protected $table = 'event_step_1';


	public function getTitleAttribute() 
    {
        return $this -> { 'title_'.App :: getLocale() };
    }

    
    public function getFullUrlAttribute() 
    {
        return $this -> eventStep0 -> fullUrl.'/'.$this -> alias;
    }

    
	public function getFullUrl($lang) 
    {
        return $this -> eventStep0 -> getFullUrl($lang).'/'.$this -> { 'alias_'.$lang };
    }


    public function eventStep0() 
    {
        return $this -> hasOne(EventStep0 :: class, 'id', 'top_level');
    }
}
