<?php

namespace App\Http\Controllers;

use App\Models\AboutUsStep0;
use App\Models\Language;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutUsController extends FrontController
{
    private const PAGE_SLUG = 'about-us';
    private static $page;

    function __construct() 
    {
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);

        AboutUsStep0::setPage(self::$page);
        // StemStep0::setPage(Page::firstWhere('slug', 'stem'));
        parent::__construct();
    }

    public static function getStep0($lang) 
    {
        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                            [
                                'homePage' => Page::firstWhere('slug', 'home'),
                                'aboutStep0' => AboutUsStep0::orderByDesc('rang')->get(),
                                // 'stemPage' => Page::firstWhere('slug', 'stem'),
                                // 'stemStep0' => StemStep0::orderByDesc('rang')->take(3)->get(),
                            ]);

        return view('modules.about-us.step0', $data);
    }


    public static function getStep1($lang, $step0Alias) 
    {
        $language = Language::firstWhere('title', $lang);
        $about = AboutUsStep0::firstWhere('alias_'.$language->title, $step0Alias);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $about),
                                                    [
                                                        'activeEvent' => $about
                                                    ]
                            );

        return view('modules.event.step1', $data);
    }
}