<?php

namespace App\Http\Controllers;

use DB;
use App;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\AboutUsStep0;
use App\Models\EventStep0;
use App\Models\PublicationsStep0;


class ReactSearchController extends Controller 
{
    public function get(Request $request) 
	{
		AboutUsStep0::setPage(Page::firstWhere('slug', 'about-us'));
		PublicationsStep0::setPage(Page::firstWhere('slug', 'publications'));

        App::setLocale($request->input('lang'));


        $searchWord = '';
	
        if($request->input('q')) {
            $searchWord = $request->input('q');
        }
        
        $searchWord = urldecode($searchWord);
        
        $searchWord = preg_replace("/[^A-ZА-ЯЁა-ჰ0-9 -]+/ui",
                                    '',
                                    $searchWord);
        

		$result = [];

		if($searchWord) {
			$i = 0;

			foreach(Page::where(function ($query) use ($searchWord) {
							$query->where('title_en', 'like', '%'.$searchWord.'%')
								->orWhere('title_az', 'like', '%'.$searchWord.'%')
								->orWhere('title_ar', 'like', '%'.$searchWord.'%')
								->orWhere('alias_en', 'like', '%'.$searchWord.'%')
								->orWhere('alias_az', 'like', '%'.$searchWord.'%')
								->orWhere('alias_ar', 'like', '%'.$searchWord.'%')
								->orWhere('text_en', 'like', '%'.$searchWord.'%')
								->orWhere('text_az', 'like', '%'.$searchWord.'%')
								->orWhere('text_ar', 'like', '%'.$searchWord.'%');
							})
						#fix to get 1 page, get from module
						->whereNotIn('slug', ['about-us'])
						->take(5)->get() as $data) {
				$result[$i]['title'] = $data->title;
				$result[$i]['fullUrl'] = $data->fullUrl;
				$result[$i]['text'] = !empty($data->text) ? $data->text : '';

				$i++;
			}

			foreach(AboutUsStep0::where('title_en', 'like', '%'.$searchWord.'%')
									->orWhere('title_az', 'like', '%'.$searchWord.'%')
									->orWhere('title_ar', 'like', '%'.$searchWord.'%')
									->orWhere('text_en', 'like', '%'.$searchWord.'%')
									->orWhere('text_az', 'like', '%'.$searchWord.'%')
									->orWhere('text_ar', 'like', '%'.$searchWord.'%')
									->take(5)->get() as $data) {
				$result[$i]['title'] = $data->title;
				$result[$i]['fullUrl'] = $data->fullUrl;
				$result[$i]['text'] = !empty($data->text) ? $data->text : '';
				
				$i++;
			}

			foreach(PublicationsStep0::where('title_en', 'like', '%'.$searchWord.'%')
										->orWhere('title_ar', 'like', '%'.$searchWord.'%')
										->orWhere('title_az', 'like', '%'.$searchWord.'%')
										->orWhere('address_en', 'like', '%'.$searchWord.'%')
										->orWhere('address_ar', 'like', '%'.$searchWord.'%')
										->orWhere('address_az', 'like', '%'.$searchWord.'%')
										->orWhere('header_text_en', 'like', '%'.$searchWord.'%')
										->orWhere('header_text_ar', 'like', '%'.$searchWord.'%')
										->orWhere('header_text_az', 'like', '%'.$searchWord.'%')
										->orWhere('black_text_en', 'like', '%'.$searchWord.'%')
										->orWhere('black_text_ar', 'like', '%'.$searchWord.'%')
										->orWhere('black_text_az', 'like', '%'.$searchWord.'%')
										->orWhere('main_text_en', 'like', '%'.$searchWord.'%')
										->orWhere('main_text_ar', 'like', '%'.$searchWord.'%')
										->orWhere('main_text_az', 'like', '%'.$searchWord.'%')
										->take(5)->get() as $data) {
				$result[$i]['title'] = $data->title;
				$result[$i]['fullUrl'] = $data->fullUrl;
				$result[$i]['text'] = !empty($data->text) ? $data->text : '';
				
				$i++;
			}

			foreach(EventStep0::where('title_en', 'like', '%'.$searchWord.'%')
									->orWhere('title_ar', 'like', '%'.$searchWord.'%')
									->orWhere('title_az', 'like', '%'.$searchWord.'%')
									->orWhere('text_en', 'like', '%'.$searchWord.'%')
									->orWhere('text_ar', 'like', '%'.$searchWord.'%')
									->orWhere('text_az', 'like', '%'.$searchWord.'%')
									->orWhere('address_en', 'like', '%'.$searchWord.'%')
									->orWhere('address_ar', 'like', '%'.$searchWord.'%')
									->orWhere('address_az', 'like', '%'.$searchWord.'%')
									->take(5)->get() as $data) {
				$result[$i]['title'] = $data->title;
				$result[$i]['fullUrl'] = $data->fullUrl;
				$result[$i]['text'] = !empty($data->text) ? $data->text : '';
				
				$i++;
			}
			
		}

        return response()->json($result);
    }
}
