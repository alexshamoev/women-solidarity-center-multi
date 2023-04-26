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

    {{ Form::open(array('route' => 'subscribeExport', 'method' => 'POST')) }}
        <div class="p-2 submit-button">
            {{ Form::submit('ექსელის ფაილი', array('class' => 'btn btn-outline-dark btn-sm')) }}
        </div>
	{{ Form::close() }}


    <table class="table table-striped">
        <thead>
            <tr>
                <th>იმეილი</th>
                <th>გამოწერის თარიღი</th>
                {{-- <th>სტატუსი</th> --}}
                <th>წაშლა</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscribers as $data)
                <tr>
                    <td>{{ $data->email}}</td>
                    <td>{{ $data->created_at->format('d-m-Y H:i:s')}}</td>
                    {{-- {{ $data->active_status == 1 ? 'აქტიური' : 'არააქტიური'}} --}}
                    <td>
                        <a href="{{ route('subscribeDelete', $data->id) }}">
                            <i class="fas fa-times text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection