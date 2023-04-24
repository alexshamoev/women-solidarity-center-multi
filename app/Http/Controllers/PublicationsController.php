<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Page;
use App\Models\PublicationsStep0;

class PublicationsController extends FrontController
{
    private const PAGE_SLUG = 'publications';
    private static $page;


    public function __construct() 
    {
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);

        PublicationsStep0::setPage(self::$page);
    }


    public static function getStep0($lang) 
    {
        $language = Language::where('title', $lang)->first();

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                                                    [
                                        				'homePage' => Page::firstWhere('slug', 'home'),
                                                        // 'resourcesPage' => Page::firstWhere('slug', 'resources'),
                                                        'publicationsStep0' => PublicationsStep0::orderByDesc('rang')->get()
                                                    ]);

        return view('modules.publications.step0', $data);
    }
    

    public static function getStep1($lang, $step0Alias) 
    {
        $language = Language::firstWhere('title', $lang);
        $publication = PublicationsStep0::firstWhere('alias_'.$language->title, $step0Alias);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $publication),
                                                    [
                                                        'activePublication' => $publication
                                                    ]
                            );

        return view('modules.publications.step1', $data);
    }
}
