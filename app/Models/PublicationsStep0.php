<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationsStep0 extends Model
{
    use HasFactory;

    protected $table = 'publications_step_0';

    private static $page;


    public static function setPage($page) 
    {
        self::$page = $page;
    }


	public function getAliasAttribute() 
    {
        return $this->{ 'alias_'.App::getLocale() };
    }


	public function getTitleAttribute() 
    {
        return $this->{ 'title_'.App::getLocale() };
    }


	public function getTextAttribute() 
    {
        return $this->{ 'text_'.App::getLocale() };
    }


	public function getAddressAttribute() 
    {
        return $this->{ 'address_'.App::getLocale() };
    }


	public function getDatetimeAttribute() 
    {
        return $this->{ 'datetime_'.App::getLocale() };
    }

    
	public function getFullUrlAttribute() 
    {
        return self::$page->fullUrl.'/'.$this->alias;
    }


    public function getFullUrl($lang) 
    {
        return '/'.$lang.'/'.self::$page->{ 'alias_'.$lang }.'/'.$this->{ 'alias_'.$lang };
    }


	public function getHeaderTextAttribute() 
    {
        return $this->{ 'header_text_'.App::getLocale() };
    }


	public function getBlackTextAttribute() 
    {
        return $this->{ 'black_text_'.App::getLocale() };
    }


    
	public function getMainTextAttribute() 
    {
        return $this->{ 'main_text_'.App::getLocale() };
    }


    public function getMetaTitleAttribute() 
    {
        $bsw = Bsw::getFullData();

        if($this->{ 'meta_title_'.App::getLocale() }) {
            return $this->{ 'meta_title_'.App::getLocale() };
        } else if($this->{ 'title_'.App::getLocale() }) {
            return $this->{ 'title_'.App::getLocale() };
        } else {
            return __('bsw.meta_title');
        }
    }


	public function getMetaDescriptionAttribute() 
    {
        $bsw = Bsw::getFullData();

        if($this->{ 'meta_description_'.App::getLocale() }) {
            $textAsDesc = strip_tags($this->{ 'meta_description_'.App::getLocale() });
            
            return mb_substr($textAsDesc, 0, 200, 'UTF-8');
        } else if($this->{ 'text_'.App::getLocale() }) {
            $textAsDesc = strip_tags($this->{ 'text_'.App::getLocale() });
            
            return mb_substr($textAsDesc, 0, 200, 'UTF-8');
        } else {
            return __('bsw.meta_description');
        }
    }

    
    public function getMetaUrlAttribute() 
    {
        if(file_exists(public_path('/storage/images/modules/news/step_0/meta_'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/photo_gallery/step_0/meta_'.$this->{ 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/news/step_0/'.$this->{ 'id' }.'.jpg'))) {
            return '/storage/images/modules/news/step_0/'.$this->{ 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }
    
}
