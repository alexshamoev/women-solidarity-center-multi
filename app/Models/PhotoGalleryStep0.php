<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bsw;
use App;


class PhotoGalleryStep0 extends Model {
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photo_gallery_step_0';


	private static $pageAlias;


	public static function setPageAlias($value) {
		self :: $pageAlias = $value;
	}


	public function getAliasAttribute() {
        return $this -> { 'alias_'.App :: getLocale() };
    }


	public function getTitleAttribute() {
        return $this -> { 'title_'.App :: getLocale() };
    }


	public function getTextAttribute() {
        return $this -> { 'text_'.App :: getLocale() };
    }

    
	public function getFullUrlAttribute() {
        return '/'.App :: getLocale().'/'.self :: $pageAlias.'/'.$this -> alias;
    }


    public function getMetaTitleAttribute() {
        $bsw = Bsw :: getFullData();

        if($this -> { 'meta_title_'.App :: getLocale() }) {
            return $this -> { 'meta_title_'.App :: getLocale() };
        } else if($this -> { 'title_'.App :: getLocale() }) {
            return $this -> { 'title_'.App :: getLocale() };
        } else {
            return $bsw -> meta_title;
        }
    }


	public function getMetaDescriptionAttribute() {
        $bsw = Bsw :: getFullData();
        if($this -> { 'meta_description_'.App :: getLocale() }) {
            $textAsDesc = strip_tags($this -> { 'meta_description_'.App :: getLocale() });

            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else if($this -> { 'text_'.App :: getLocale() }) {
            $textAsDesc = strip_tags($this -> { 'text_'.App :: getLocale() });

            return mb_substr($textAsDesc, 0, 255, 'UTF-8');
        } else {
            return $bsw -> meta_description;
        }
    }

    public function getMetaUrlAttribute() {
        if(file_exists(public_path('/storage/images/modules/photo_gallery/step_0/meta_'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/photo_gallery/step_0/meta_'.$this -> { 'id' }.'.jpg';
        } else if(file_exists(public_path('/storage/images/modules/photo_gallery/step_0/'.$this -> { 'id' }.'.jpg'))) {
            return '/storage/images/modules/photo_gallery/step_0/'.$this -> { 'id' }.'.jpg';
        } else {
            return '/storage/images/meta_default.jpg';
        }
    }


	public function photoGalleryStep1() {
        return $this -> hasMany(PhotoGalleryStep1 :: class, 'parent', 'id') -> orderBy('rang', 'desc');
    }
}
