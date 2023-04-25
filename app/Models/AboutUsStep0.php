<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsStep0 extends Model
{
    use HasFactory;

    protected $table = 'about_us_step_0';
    private static $page;


    public static function setPage($page) {
        self::$page = $page;
    }


	public function getAliasAttribute() {
        return $this->{ 'alias_'.App::getLocale() };
    }


	public function getTitleAttribute() {
        return $this->{ 'title_'.App::getLocale() };
    }


	public function getTextAttribute() {
        return $this->{ 'text_'.App::getLocale() };
    }

    
	public function getFullUrlAttribute() {
        return self::$page->fullUrl.'/'.$this->alias;
    }


    public function getMetaTitleAttribute() {
        if($this->{ 'meta_title_'.App::getLocale() }) {
            return $this->{ 'meta_title_'.App::getLocale() };
        } else if($this->{ 'title_'.App::getLocale() }) {
            return $this->{ 'title_'.App::getLocale() };
        } else {
            return config('bsw.meta_title');
        }
    }


	public function getMetaDescriptionAttribute() {
        if($this->{ 'meta_description_'.App::getLocale() }) {
            $textAsDesc = strip_tags($this->{ 'meta_description_'.App::getLocale() });
            
            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else if($this->{ 'text_'.App::getLocale() }) {
            $textAsDesc = strip_tags($this->{ 'text_'.App::getLocale() });
            
            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else {
            return config('bsw.meta_description');
        }
    }

    
    public function getMetaUrlAttribute() {
        if(file_exists(public_path('/storage/images/modules/about_us/85/meta_'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/about_us/85/meta_'.$this->{ 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/about_us/85/'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/about_us/85/'.$this->{ 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }

	// public function newsStep1() {
    //     return $this->hasMany(NewsStep1::class, 'top_level', 'id')->orderBy('rang', 'desc');
    // }


    public function getFullUrl($lang) {
        return '/'.$lang.'/'.self::$page->{ 'alias_'.$lang }.'/'.$this->{ 'alias_'.$lang };
    }
}
