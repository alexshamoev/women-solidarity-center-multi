@extends('master')

@section('pageMetaTitle'){{ $page->metaTitle }}@endsection
@section('pageMetaDescription'){{ $page->metaDescription }}@endsection
@section('pageMetaUrl'){{ $page->metaUrl }}@endsection

@section('content')
    @if(Session::has('join-success'))
        <div class="pt-3 container">
            <div class="alert alert-success m-0" role="alert">
                {{ Session::get('join-success') }}
            </div>
        </div>
    @endif

    @if(Session::has('join-error'))
        <div class="p-2">
            <div class="alert alert-success m-0" role="alert">
                {{ Session::get('join-error') }}
            </div>
        </div>
    @endif

	<div class="container
				application
                p-md-0
                p-3
                pt-md-3
                main_section_padding
                ">
		<div class="border 
                    py-md-5 
                    application__board
                    bg-white">
            <div class="row">
                <div class="col-lg-4 
                            d-flex 
                            align-items-center 
                            application__board_title">
                    <h2 class="p-2 text-center">
                        {{ $page->title }}
                    </h2>
                </div>

                <div class="col-lg-8 p-2">
                    <div class="d-flex 
                                justify-content-center 
                                align-items-center 
                                pb-4">
                        <div class="p-2 application__number_prnt" >
                            <div class="application__number application__number_active" data-number="1">1</div>
                        </div>
 
                        <div class="p-2">
                            <div class="application__hor_line"></div>
                        </div>

                        <div class="p-2 application__number_prnt" >
                            <div class="application__number" data-number="2">2</div>
                        </div>

                        <div class="p-2">
                            <div class="application__hor_line"></div>
                        </div>

                        <div class="p-2 application__number_prnt" >
                            <div class="application__number" data-number="3">3</div>
                        </div>
                    </div>
                    {{-- 'route' => 'applicationInsert' --}}
                    {{ Form::open(array( 'method' => 'POST')) }}
                    <div class="row">
                        
                    </div>
                        <div class="application__page">
                            <div class="row 
                                        application__form 
                                        d-flex 
                                        justify-content-center
                                        application__content">
                                <div class="col-lg-10
                                            application__input_initials 
                                            p-2
                                            position-relative">
                                    {{ Form::text('name', old('fullname'), array('required' => 'required', 'placeholder' => __('bsw.name'))) }}
                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>	

                                <div class="col-lg-10 
                                            application__input_initials 
                                            p-2
                                            position-relative">
                                    {{ Form::text('lastname', old('lastname'), array('required' => 'required', 'placeholder' => __('bsw.lastName'))) }}
                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>	

                                <div class="col-lg-10 
                                            application__input_initials
                                            p-2
                                            position-relative">
                                    {{ Form::number('age', old('age'), array('required' => 'required', 'placeholder' => __('bsw.age'))) }}
                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>

                                 
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-10 
                                            p-2 
                                            d-flex 
                                            justify-content-between 
                                            align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="application__snowflake me-2">
                                            <img src="{{ asset('/storage/images/flake.svg') }}">
                                        </div>
                                        
                                        <div>
                                            ველის შევსება სავალდებულოა
                                        </div>
                                    </div>
                                    
                                    <div class="application__button" data-id="1">
                                        {{ Form::button(__('bsw.next'), ['class' => 'px-5 py-2 fw-bold']) }}
                                    </div>
                                </div>  
                            </div>
                        </div>
                    
                        <div class="application__page">
                            <div class="row 
                                        d-flex 
                                        justify-content-center
                                        application__content">
                                @foreach ($optionTitle as $item)
                                    <div class="col-lg-10 p-2">
                                        <div class=" w-100 position-relative">
                                            <div class="mt-3 
                                                        application__slide border 
                                                        p-3
                                                        d-flex
                                                        align-items-center
                                                        justify-content-between">
                                                <div>
                                                    {{ Form::label('proffessions_step_'.$item->id, $item->title) }}
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <div class="application__arrow_down 
                                                                d-flex 
                                                                align-items-center 
                                                                me-2">
                                                        <img src="{{ asset('/storage/images/arrow_down.svg') }}">
                                                    </div>

                                                    <div class="application__snowflake">
                                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="application__slide_box 
                                                        position-absolute 
                                                        bg-white 
                                                        w-100 
                                                        start-0">
                                                <div class="p-0">
                                                    @foreach($item->proffesionsStep1 as $profession)
                                                        <div class="d-flex border p-2 position-relative">
                                                            <div class="p-2">
                                                                {{ Form::checkbox('proffessions_step_'.$item->id.'_'.$profession->id .'[]', $profession->id, false, ['id' => 'proffessions_step_'.$item->id.'_'.$profession->id .'[]']) }}
                                                            </div>

                                                            <div class="position-absolute w-100 h-100 top-0 start-0" >
                                                                {{ Form::label('proffessions_step_'.$item->id.'_'.$profession->id .'[]', $profession->title,['class' => 'w-100 h-100 d-flex align-items-center ps-5']) }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach 
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-10 
                                            p-2 
                                            d-flex 
                                            justify-content-between 
                                            align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="application__snowflake me-2">
                                            <img src="{{ asset('/storage/images/flake.svg') }}">
                                        </div>

                                        <div>
                                            ველის შევსება სავალდებულოა
                                        </div>
                                    </div>
                                    
                                    <div class="application__button" data-id="2">
                                        {{ Form::button(__('bsw.next'), ['class' => 'px-5 py-2 fw-bold']) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="application__page">
                            <div class="row 
                                        d-flex 
                                        justify-content-center 
                                        application__form
                                        application__content">  
                                <div class="p-2 col-lg-10 testss">
                                    {{ Form::text('work_study_direction', old('work_study_direction'), array('placeholder' => __('bsw.work_study_direction'))) }}
                                </div>

                                <div class="p-2 col-lg-10">
                                    {{ Form::text('work_study_name', old('work_study_name'), array('placeholder' => __('bsw.work_study_name'))) }}
                                </div>

                                <div class="p-2 col-lg-10">
                                    {{ Form::text('why_want', old('why_want'), array('required' => 'required', 'placeholder' => __('bsw.why_want'))) }}
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-10 
                                            p-2 
                                            d-flex 
                                            justify-content-between 
                                            align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="application__snowflake me-2">
                                            <img src="{{ asset('/storage/images/flake.svg') }}">
                                        </div>

                                        <div class="pe-3">
                                            ველის შევსება სავალდებულოა
                                        </div>
                                    </div>
                                    
                                    <div class="application__submit">
                                        {{ Form::submit(__('bsw.fill_app'), ['class' => 'p-2 px-3 border-0 fw-bold']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
	</div>
@endsection