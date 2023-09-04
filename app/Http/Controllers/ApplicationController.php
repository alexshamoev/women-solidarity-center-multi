<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Page;
use App\Models\ProfessionsStep0;
use App\Models\ProfessionsStep1;
use Illuminate\Http\Request;

class ApplicationController extends FrontController
{
    private const PAGE_SLUG = 'application';
    private static $page;

    function __construct() 
    {
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
        // parent::__construct();
    }


    public static function getStep0($lang) 
    {
        $language = Language::firstWhere('title', $lang);
        
        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                            [
                				'homePage' => Page::firstWhere('slug', 'home'),
                                'resourcesPage' => Page::firstWhere('slug', 'resources'),
                                'questions1' => ProfessionsStep0::whereIn('id', [1,2])->get(),
                                'questions2' => ProfessionsStep0::whereIn('id', [3,4])->get(),
                            ]);

        return  view('modules.application.step0', $data);
    }
}
