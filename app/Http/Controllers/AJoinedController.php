<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Joined;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\ProfessionsStep1;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Requests\AJoinedRequest;
use OpenSpout\Common\Entity\Style\Style;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AJoinedController extends AController
{
    public function getStartPoint()
    {
		$data = array_merge(self::getDefaultData(),
								[
									'module' => Module::firstWhere('alias', 'joined'),
                                    'joined' => Joined::orderByDesc('id')->get(),
								]);

      	return view('modules.joined.admin_panel.start_point', $data);
    }


    public function join(AJoinedRequest $request)
    {
        $join = Joined::create([
            'name' => $request->input('name'),
            'last_name' => $request->input('lastname'),
            'age' => $request->input('age'),
            'proffessions_step_1_top_level=1' => json_encode($request->input('proffessions_step_1')),
            'proffessions_step_1_top_level=2' => json_encode($request->input('proffessions_step_2')),
            'work_study_direction' => $request->input('work_study_direction'),
            'work_study_name' => $request->input('work_study_name'),
            'why_want' => $request->input('why_want'),
        ]);
        
        if($join){
            return redirect()->back()->with('join-success', 'გილოცავთ, თქვენ წარმატებით გაწევრიანდით');
        }

        return redirect()->back()->with('join-error', 'დაფიქესირდა შეცდომა, სცადეთ ხელახლა');
    }


    public function export()
    {

        $joined = Joined::orderByDesc('id')->get();
        $header_style = (new Style())->setFontBold()->setFontItalic();
        
        return (new FastExcel($joined))
                    ->headerStyle($header_style)
                    ->download('members.xlsx', function($joined) {

                        $answer_1 = $answer_2 = '';

                        $param1 = json_decode($joined->{'proffessions_step_1_top_level=1'});
                        if(is_array($param1)){
                            $ans1 = ProfessionsStep1::WhereIn('id', $param1)->pluck('title_en')->toArray();
                            $answer_1 = implode(", ",$ans1);
                        }

                        $param2 = json_decode($joined->{'proffessions_step_1_top_level=2'});
                        if(is_array($param2)){
                            $ans2 = ProfessionsStep1::WhereIn('id', $param2)->pluck('title_en')->toArray();
                            $answer_2 = implode(", ",$ans2);
                        }
                        
                        return [
                                'სახელი' => $joined->name,
                                'გვარი' => $joined->last_name,
                                'ასაკი' => $joined->age,
                                'რომელ პროფესიულ სფეროსთან გაქვს შეხება?' => $answer_1,
                                'დებულება რომელიც შეესაბამება' => $answer_2,
                                'რა მიმართულებით სწავლობთ/მუშაობთ?' => $joined->work_study_direction,
                                'სასწავლებლის/ორგანიზაციის დასახელება' => $joined->work_study_name,
                                'რატომ გსურთ გაწევრიანება?' => $joined->why_want,
                                'გაწევრიანების თარიღი' => $joined->created_at->format('d-m-Y'),
                            ];
        });
	}


    public function delete($id)
    {
        $row = Joined::find($id);

        if($row) {
            $row->delete();

            Session::flash('successStatus', __('bsw.deleteSuccessStatus'));

            return redirect()->route('joinedStartPoint');
        }
    }
}
