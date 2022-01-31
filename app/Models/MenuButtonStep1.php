<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuButtonStep1 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu_buttons_step_1';


	private static $lang;
	private static $pageAlias;


	public static function setLang($value) {
		self :: $lang = $value;
	}


	public static function setPage($value) {
		self :: $pageAlias = $value;
	}


	public function getTitleAttribute() {
        return $this -> { 'title_'.self :: $lang };
    }


	public function getFreeLinkAttribute() {
        return $this -> { 'free_link_'.self :: $lang };
    }


	public function getUrlTargetAttribute() {
		if($this -> open_in_new_tab) {
			return '_blank';
		}
		
		return '_self';
    }


	public function getUrlAttribute() {
		switch($this -> link_type) {
			case 'page':
				$page = Page :: where('id', $this -> page) -> first();

				return '/'.self :: $lang.'/'.$page -> alias;

				break;
			case 'free_link':
				return $this -> freeLink;

				break;
			case 'without_link':
				return false;

				break;
		}
    }


	public function getActiveAttribute() {
		$page = Page :: where('id', $this -> page) -> first();

		if($page -> alias === self :: $pageAlias) {
        	return 1;
		}

		return 0;
    }
}