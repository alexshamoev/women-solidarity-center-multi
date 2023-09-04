<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Http\Requests\ASubscribeRequest;
use App\Models\Subscribe;
use OpenSpout\Common\Entity\Style\Style;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Mail;
use App\Mail\Subscribe as MailSubscribe;
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
        if(Subscribe::where('email', $request->input('email_subscribe'))->doesntExist()){

            $subscribe = Subscribe::create([
                'email' => $request->input('email_subscribe'),
                'active_status' => 1,
            ]);
            
            # send welcome email to subscriber
            try {
                $mail = new MailSubscribe($request->input('email_subscribe'));
                Mail::to($request->input('email_subscribe'))->send($mail);
            } catch (\Throwable $th) {
                Log::error("message: ".$th->getMessage());
            }

            if($subscribe){
                return redirect()->back()->with('subscribe-success', __('bsw.subscribe-success'));
            }else{
                return redirect()->back()->with('subscribe-error',  __('bsw.subscribe-error'));
            }
        }

        return redirect()->back()->with('subscribe-error',  __('bsw.subscribe-error2'));

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
