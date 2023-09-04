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
        $answer_1 = $answer_2 = $answer_3 = $answer_4 = '';

        // for first option
        if (!empty($request->input('proffessions_step_1_top_level=1'))){
            $answer_1 = implode(', ' , $request->input('proffessions_step_1_top_level=1'));

            if (!empty($request->input('otherInput1'))) {
                $answer_1 = $answer_1.', '. $request->input('otherInput1');
            }
        } elseif (!empty($request->input('otherInput1'))) {
            $answer_1 = $request->input('otherInput1');
        }

        // for second option
        if (!empty($request->input('proffessions_step_1_top_level=2'))){
            $answer_2 = implode(', ' , $request->input('proffessions_step_1_top_level=2'));

            if (!empty($request->input('otherInput2'))) {
                $answer_2 = $answer_2.', '. $request->input('otherInput2');
            }
        } elseif (!empty($request->input('otherInput2'))) {
            $answer_2 = $request->input('otherInput2');
        }

        // for 3rd option
        if (!empty($request->input('proffessions_step_1_top_level=3'))){
            $answer_3 = implode(', ' , $request->input('proffessions_step_1_top_level=3'));

            if (!empty($request->input('otherInput3'))) {
                $answer_3 = $answer_3.', '. $request->input('otherInput3');
            }
        } elseif (!empty($request->input('otherInput3'))) {
            $answer_3 = $request->input('otherInput3');
        }

        // for 4th option
        if (!empty($request->input('proffessions_step_1_top_level=4'))){
            $answer_4 = implode(', ' , $request->input('proffessions_step_1_top_level=4'));

            if (!empty($request->input('otherInput4'))) {
                $answer_4 = $answer_4.', '. $request->input('otherInput4');
            }
        } elseif (!empty($request->input('otherInput4'))) {
            $answer_4 = $request->input('otherInput4');
        }

        $join = Joined::create([
            'name' => $request->input('name'),
            'last_name' => $request->input('lastname'),
            'age' => $request->input('age'),
            'proffessions_step_1_top_level=1' => $answer_1,
            'proffessions_step_1_top_level=2' => $answer_2,
            'work_study_direction' => $request->input('work_study_direction'),
            'work_study_name' => $request->input('work_study_name'),
            'why_want' => $request->input('why_want'),
            'email_address' => $request->input('insert_email_address'),
            'phone_number' => $request->input('insert_phone_number'),
            'proffessions_step_1_top_level=3' => $answer_3,
            'proffessions_step_1_top_level=4' => $answer_4,
        ]);
        
        if ($join){
            return redirect()->back()->with('join-success', __('bsw.join-success'));
        }

        return redirect()->back()->with('join-error', __('bsw.join-error'));
    }


    public function export()
    {
        $joined = Joined::orderByDesc('id')->get();
        $header_style = (new Style())->setFontBold()->setFontItalic();

		return (new FastExcel($joined))
                    ->headerStyle($header_style)
                    ->download('members.xlsx', function($joined) {

                        $answer_1 = $answer_2 = $answer_3 = $answer_4 = '';

                        $answer_1 = $joined->{ 'proffessions_step_1_top_level=1' };
                        $answer_2 = $joined->{ 'proffessions_step_1_top_level=2' };
                        $answer_3 = $joined->{ 'proffessions_step_1_top_level=3' };
                        $answer_4 = $joined->{ 'proffessions_step_1_top_level=4' };

                        return [
                                'სახელი' => $joined->name,
                                'გვარი' => $joined->last_name,
                                'ასაკი' => $joined->age,
                                'რომელ პროფესიულ სფეროსთან გაქვს შეხება?' => $answer_1,
                                'დებულება რომელიც შეესაბამება' => $answer_2,
                                'რა მიმართულებით სწავლობთ/მუშაობთ?' => $joined->work_study_direction,
                                'სასწავლებლის/ორგანიზაციის დასახელება' => $joined->work_study_name,
                                'რატომ გსურთ გაწევრიანება?' => $joined->why_want,
                                'ყველაზე მნიშვნელოვანი უპირატესობები' => $answer_3,
                                'საიდან შეიტყვეთ?' => $answer_4,
                                'იმეილი' => $joined->email_address,
                                'ნომერი' => $joined->phone_number,
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
