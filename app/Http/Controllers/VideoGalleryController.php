<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Page;
use App\Models\VideoGalleryStep0;
use App\Http\Controllers\FrontController;

class VideoGalleryController extends FrontController
{
    private const PAGE_SLUG = 'video-gallery';
    private static $page;

    function __construct() {
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);

        VideoGalleryStep0::setPage(self::$page);

        parent::__construct();
    }

    public static function getStep0($lang) 
    {
        $language = Language::firstWhere('title', $lang);

        $data = array_merge(self::getDefaultData($language,
                                                    self::$page),
                            [
                				'homePage' => Page::firstWhere('slug', 'home'),
                                // 'resourcesPage' => Page::firstWhere('slug', 'resources'),
                                'videoGalleryStep0' => VideoGalleryStep0::orderByDesc('id')->get()
                            ]);

        return view('modules.video_gallery.step0', $data);
    }
}
