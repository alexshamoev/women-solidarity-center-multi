<?php

namespace App\Http\Controllers;

use App\Models\CareerStep0;
use App\Models\EventStep0;
use App\Models\Language;
use App\Models\Page;

class EventController extends FrontController
{
    private const PAGE_SLUG = 'event';
    private static $page;

    function __construct() 
    {
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);

        EventStep0::setPage(self::$page);
        // CareerStep0::setPage(Page::firstWhere('slug', 'career'));
        parent::__construct();
    }

    public static function getStep0($lang) 
    {
        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                            [
                                'homePage' => Page::firstWhere('slug', 'home'),
                                'plannedEvents' => EventStep0::where('event_date', '>=', date('Y-m-d'))->orderBy('event_date', 'desc')->get(),
                                'oldEvents' => EventStep0::where('event_date', '<', date('Y-m-d'))->orWhereNull('event_date')->orderBy('event_date', 'desc')->get()
                            ]);

        return view('modules.event.step0', $data);
    }


    public static function getStep1($lang, $step0Alias) 
    {
        $language = Language::firstWhere('title', $lang);
        $event = EventStep0::firstWhere('alias_'.$language->title, $step0Alias);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page,
                                                    $event),
                                                    [   
                                                        'homePage' => Page::firstWhere('slug', 'home'),
                                                        'activeEvent' => $event,
                                                        // 'careerPage' => Page::firstWhere('slug', 'career'),
                                                        // 'career' => CareerStep0::orderByDesc('id')->take(3)->get(),
                                                    ]
                            );

        return view('modules.event.step1', $data);
    }
}
