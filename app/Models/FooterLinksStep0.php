<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLinksStep0 extends Model
{
    use HasFactory;

    protected $table = 'footer_links_step_0';
	

    public function getUrlTargetAttribute() {
		if($this -> open_in_new_tab) {
			return '_blank';
		}
		
		return '_self';
    }


	public function getUrlAttribute() 
    {
		switch($this -> link_type) {
			case 'page':
				if($this -> page) {
					return '/'.App :: getLocale().'/'.$this -> page -> alias;
				} else {
					return false;
				}

				break;
			case 'free_link':
				return $this -> freeLink;

				break;
			case 'without_link':
				return false;

				break;
		}
    }
	

	public function page() 
    {
        return $this -> hasOne(Page :: class, 'id', 'page_id');
    }


	public function footerLinksStep1() 
    {
        return $this -> hasMany(FooterLinksStep1 :: class, 'top_level', 'id') -> orderBy('rang', 'desc');
    }
}
