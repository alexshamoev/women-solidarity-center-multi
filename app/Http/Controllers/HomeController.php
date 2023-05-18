<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;
use App\Models\EventStep0;
use App\Models\AboutUsStep0;
use App\Models\PublicationsStep0;
use App\Models\AnimatedHeaderStep0;
use App\Http\Controllers\FrontController;

class HomeController extends FrontController 
{
    private const PAGE_SLUG = 'home';
    private static $page;


    public function __construct() 
    {
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
        AboutUsStep0::setPage(Page::firstWhere('slug', 'about-us'));
        EventStep0::setPage(Page::firstWhere('slug', 'event'));
        PublicationsStep0::setPage(Page::firstWhere('slug', 'publications'));
    }
    
    
    public static function getStep0($lang) 
    {
        $language = Language::where('title', $lang)->first();

        $data = array_merge(self::getDefaultData($language, self::$page), 
                                                [
                                                    'animatedHeader' => AnimatedHeaderStep0::orderByDesc('rang')->get(),
                                                    'eventPage' => Page::firstWhere('slug', 'event'),
                                                    'lastEvent' => EventStep0::orderBy('id', 'desc')->take(1)->first(),
                                                    'publicationsPage' => Page::firstWhere('slug', 'publications'),
                                                    'lastPublication' => PublicationsStep0::orderBy('id', 'desc')->take(1)->first(),
                                                    'visibleEvent' => EventStep0::orderByDesc('id')->first(),
                                                    'aboutPage' => AboutUsStep0::first(),
                                                ]);
        
        return view('modules.home.step0', $data);
    }
}