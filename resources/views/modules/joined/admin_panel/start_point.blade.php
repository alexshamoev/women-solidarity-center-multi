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

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="align-bottom text-center">სახელი</th>
                    <th class="align-bottom text-center">გვარი</th>
                    <th class="align-bottom text-center">ასაკი</th>
                    <th class="align-bottom text-center">რომელ პროფესიულ სფეროსთან გაქვს შეხება?</th>
                    <th class="align-bottom text-center">დებულება რომელიც შეესაბამება</th>
                    <th class="align-bottom text-center">რა მიმართულებით სწავლობთ/მუშაობთ?</th>
                    <th class="align-bottom text-center">სასწავლებლის/ორგანიზაციის დასახელება</th>
                    <th class="align-bottom text-center">რატომ გსურთ გაწევრიანება?</th>
                    <th class="align-bottom text-center">ყველაზე მნიშვნელოვანი უპირატესობები</th>
                    <th class="align-bottom text-center">საიდან შეიტყვეთ?</th>
                    <th class="align-bottom text-center">იმეილი</th>
                    <th class="align-bottom text-center">ნომერი</th>
                    <th class="align-bottom text-center">გაწევრიანების თარიღი</th>
                    <th class="align-bottom text-center">წაშლა</th>
                </tr>
            </thead>
            <tbody>
                @foreach($joined as $data)
                    <tr>
                        <td class="align-middle text-center">{{ $data->name }}</td>
                        <td class="align-middle text-center">{{ $data->last_name }}</td>
                        <td class="align-middle text-center">{{ $data->age }}</td>
                        <td class="align-middle text-center">{{ $data->{'proffessions_step_1_top_level=1'} }}</td>
                        <td class="align-middle text-center">{{ $data->{'proffessions_step_1_top_level=2'} }}</td>
                        <td class="align-middle text-center">{{ $data->work_study_direction }}</td>
                        <td class="align-middle text-center">{{ $data->work_study_name }}</td>
                        <td class="align-middle text-center">{{ $data->why_want }}</td>
                        <td class="align-middle text-center">{{ $data->{'proffessions_step_1_top_level=3'} }}</td>
                        <td class="align-middle text-center">{{ $data->{'proffessions_step_1_top_level=4'} }}</td>
                        <td class="align-middle text-center">{{ $data->email_address}}</td>
                        <td class="align-middle text-center">{{ $data->phone_number }}</td>
                        <td class="align-middle text-center">{{ $data->created_at->format("d-m-Y") }}</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('joinedeDelete', $data->id) }}">
                                <i class="fas fa-times text-danger"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection