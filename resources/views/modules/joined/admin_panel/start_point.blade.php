@extends('admin.master')

@section('pageMetaTitle')
	{{ $module -> title }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module -> title
	])

    @if($errors -> any())
    <div class="p-2">
        <div class="alert alert-danger m-0">
        {{ __('bsw.warningStatus') }}
        </div>
    </div>
    @endif


    @if(Session :: has('successStatus'))
    <div class="p-2">
        <div class="alert alert-success m-0" role="alert">
            {{ Session :: get('successStatus') }}
        </div>
    </div>
    @endif

    {{ Form::open(array('route' => 'joinedExport', 'method' => 'POST')) }}
        <div class="p-2 submit-button">
            {{ Form::submit('ექსელის ფაილი', array('class' => 'btn btn-outline-dark btn-sm')) }}
        </div>
	{{ Form::close() }}


    <table class="table table-striped ">
        <thead>
            <tr>
                <th>სახელი</th>
                <th>გვარი</th>
                <th>ასაკი</th>
                <th>რომელ პროფესიულ სფეროსთან გაქვს შეხება?</th>
                <th>დებულება რომელიც შეესაბამება</th>
                <th>რა მიმართულებით სწავლობთ/მუშაობთ?</th>
                <th>სასწავლებლის/ორგანიზაციის დასახელება</th>
                <th>რატომ გსურთ გაწევრიანება?</th>
                <th>გაწევრიანების თარიღი</th>
                <th>წაშლა</th>
            </tr>
        </thead>
        <tbody>
            @foreach($joined as $data)
                @php
                    # retrieve question 1 and 2 answers from model, checks if its array for query, then concat in table. 
                    $answer_1 = $answer_2 = '';

                    $param1 = json_decode($data->{'proffessions_step_1_top_level=1'});
                    if(is_array($param1)){
                        $ans1 = App\Models\ProfessionsStep1::WhereIn('id', $param1)->pluck('title_en')->toArray();
                        $answer_1 = implode(", ",$ans1);
                    }

                    $param2 = json_decode($data->{'proffessions_step_1_top_level=2'});
                    if(is_array($param2)){
                        $ans2 = App\Models\ProfessionsStep1::WhereIn('id', $param2)->pluck('title_en')->toArray();
                        $answer_2 = implode(", ",$ans2);
                    }
                    
                @endphp

                <tr >
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->last_name }}</td>
                    <td>{{ $data->age }}</td>
                    <td>{{ $answer_1 }}</td>
                    <td>{{ $answer_2 }}</td>
                    <td>{{ $data->work_study_direction }}</td>
                    <td>{{ $data->work_study_name }}</td>
                    <td>{{ $data->why_want }}</td>
                    <td>{{ $data->created_at->format("d-m-Y") }}</td>
                    <td>
                        <a href="{{ route('joinedeDelete', $data->id) }}">
                            <i class="fas fa-times text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection