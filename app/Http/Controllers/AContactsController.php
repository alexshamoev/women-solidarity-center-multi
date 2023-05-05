<?php

namespace App\Http\Controllers;

use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Http\Requests\AContactsUpdateRequest;

class AContactsController extends AController {
    public function edit() {
        $bswAddress = Bsw::where('system_word', 'address')->first(); 

		$data = array_merge(self::getDefaultData(), ['module' => Module::where('alias', 'contacts')->first(),
                                                        'address_az' => $bswAddress->word_az, 
                                                        'address_en' => $bswAddress->word_en, 
                                                        'address_ar' => $bswAddress->word_ar]);

		return view('modules.contacts.admin_panel.start_point', $data);
	}


    public function update(AContactsUpdateRequest $request) {        
        $bsc = Bsc::where('system_word', 'admin_email')->first();
		$bsc->configuration = $request->input('admin_email');
		$bsc->save();

        $bsc = Bsc::where('system_word', 'facebook_link')->first();
		$bsc->configuration = $request->input('facebook_link');
		$bsc->save();

        $bsc = Bsc::where('system_word', 'instagram_link')->first();
		$bsc->configuration = $request->input('instagram_link');
		$bsc->save();

        $bsc = Bsc::where('system_word', 'twitter_link')->first();
		$bsc->configuration = $request->input('twitter_link');
		$bsc->save();

        $bsc = Bsc::where('system_word', 'phone_number')->first();
		$bsc->configuration = $request->input('phone_number');
		$bsc->save();

        $bsc = Bsc::where('system_word', 'cordinate_x')->first();
		$bsc->configuration = $request->input('cordinate_x');
		$bsc->save();

        $bsc = Bsc::where('system_word', 'cordinate_y')->first();
		$bsc->configuration = $request->input('cordinate_y');
		$bsc->save();

        $bsc = Bsc::where('system_word', 'map_number')->first();
		$bsc->configuration = $request->input('map_number');
		$bsc->save();

        $bsw = Bsw::where('system_word', 'address')->first();
		$bsw->word_az = $request->input('address_az');
		$bsw->word_en = $request->input('address_en');
		$bsw->word_ar = $request->input('address_ar');
		$bsw->save();

        
        $request->session()->flash('successStatus', __('bsw.successStatus'));

		return redirect()->route('contactsEdit');
	}
}
