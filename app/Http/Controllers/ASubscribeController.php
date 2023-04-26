<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Http\Requests\ASubscribeRequest;
use App\Models\Subscribe;
// use OpenSpout\Common\Entity\Style\Style;
// use Rap2hpoutre\FastExcel\FastExcel;
use Session;

class ASubscribeController extends AController
{
    public function getStartPoint()
    {
		$data = array_merge(self::getDefaultData(),
								[
									'module' => Module::firstWhere('alias', 'subscribe'),
                                    'subscribers' => Subscribe::orderByDesc('id')->get(),
								]);

      	return view('modules.subscribe.admin_panel.start_point', $data);
    }


    public function subscribe(ASubscribeRequest $request)
    {
        $exist = Subscribe::firstwhere('email', $request->input('email_subscribe'));

        if(!$exist){
            $subscribe = Subscribe::create([
                'email' => $request->input('email_subscribe'),
                'active_status' => 1,
            ]);

            if($subscribe){
                return redirect()->back()->with('subscribe-success', 'თქვენ წარმატებით გამოიწერეთ სიახლეები');
            }else{
                return redirect()->back()->with('subscribe-error', 'დაფიქესირდა შეცდომა, სცადეთ ხელახლა');
            }
        }

        return redirect()->back()->with('subscribe-error', 'მითითებულ იმეილზე უკვე გამოწერილია სიახლეები');

    }


    public function export()
    {

		$subscribers = Subscribe::orderByDesc('id')->get();
        $header_style = (new Style())->setFontBold()->setFontItalic();

		return (new FastExcel($subscribers))
                    ->headerStyle($header_style)
                    ->download('subscribers.xlsx', function($subscribers) {
                        return [
                                'იმეილი' => $subscribers->email,
                                'გამოწერის თარიღი' => $subscribers->created_at->format('d-m-Y H:i:s'),
                            ];
        });
	}


    public function delete($id)
    {
        $subscribe = Subscribe::find($id);

        if($subscribe) {
            $subscribe->delete();

            Session::flash('successStatus', __('bsw.deleteSuccessStatus'));

            return redirect()->route('subscribeStartPoint');
        }
    }
}
