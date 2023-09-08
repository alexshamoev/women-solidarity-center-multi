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
                main_section_padding">
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
                            <div class="application__number application__number_first application__number_active" data-number="1">1</div>
                        </div>
 
                        <div class="p-2 d-md-block d-none">
                            <div class="application__hor_line"></div>
                        </div>

                        <div class="p-2 application__number_prnt" >
                            <div class="application__number application__number_second" data-number="2">2</div>
                        </div>

                        <div class="p-2 d-md-block d-none">
                            <div class="application__hor_line"></div>
                        </div>

                        <div class="p-2 application__number_prnt" >
                            <div class="application__number application__number_third" data-number="3">3</div>
                        </div>

                        <div class="p-2 d-md-block d-none">
                            <div class="application__hor_line"></div>
                        </div>

                        <div class="p-2 application__number_prnt" >
                            <div class="application__number application__number_forth" data-number="4">4</div>
                        </div>

                        <div class="p-2 d-md-block d-none">
                            <div class="application__hor_line"></div>
                        </div>

                        <div class="p-2 application__number_prnt" >
                            <div class="application__number application__number_fifth" data-number="5">5</div>
                        </div>
                    </div>

                    {{ Form::open(array('route' => 'applicationInsert', 'method' => 'POST', 'id' => 'application_form')) }}
                        <div class="application__page">
                            <div class="row 
                                        application__form 
                                        d-flex 
                                        justify-content-center
                                        application__content">
                                <div class="col-lg-10 application__label">
                                    <h4>
                                        {{ __('bsw.name') }}
                                    </h4>
                                </div>

                                <div class="col-lg-10
                                            application__input_initials 
                                            p-2
                                            position-relative">
                                    {{ Form::text('name', old('fullname'), array('required' => 'required', 'placeholder' => __('bsw.enter_name'))) }}
                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>	

                                <div class="col-lg-10 p-0">
                                    <div class="text-danger 
                                                file_field_first  
                                                ps-2">
                                        {{ __('bsw.fill_field') }}
                                    </div>
                                </div>

                                <div class="col-lg-10 application__label">
                                    <h4>
                                        {{ __('bsw.lastName') }}
                                    </h4>
                                </div>

                                <div class="col-lg-10 
                                            application__input_initials 
                                            p-2
                                            position-relative">
                                    {{ Form::text('lastname', old('lastname'), array('required' => 'required', 'placeholder' => __('bsw.enter_lastName'),'class' => 'step_first_input')) }}
                                    
                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>	

                                <div class="col-lg-10 p-0">
                                    <div class="text-danger 
                                                file_field_first 
                                                ps-2">
                                        {{ __('bsw.fill_field') }}
                                    </div>
                                </div>

                                <div class="col-lg-10 application__label">
                                    <h4>
                                        {{ __('bsw.age') }}
                                    </h4>
                                </div>

                                <div class="col-lg-10 
                                            application__input_initials
                                            p-2
                                            position-relative">
                                    {{ Form::number('age', old('age'), array('required' => 'required', 'placeholder' => __('bsw.enter_age'), 'class' => 'step_first_input')) }}

                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>

                                <div class="col-lg-10 p-0">
                                    <div class="text-danger 
                                                file_field_first 
                                                ps-2">
                                        {{ __('bsw.fill_field') }}
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
                                            {{ __('bsw.fill_field') }}
                                        </div>
                                    </div>
                                    
                                    <div class="application__button" data-id="1">
                                        {{ Form::button(__('bsw.next'), ['class' => 'px-5 py-2 fw-bold btn__form']) }}
                                    </div>
                                </div>  
                            </div>
                        </div>
                    
                        <div class="application__page">
                            <div class="row 
                                        d-flex 
                                        justify-content-center
                                        application__content">
                                @foreach ($questions1 as $item)
                                    <div class="col-lg-10 p-2">
                                        <div class=" w-100 position-relative">
                                            <div class="application__label">
                                                <h4>
                                                    {{ Form::label('proffessions_step_'.$item->id, $item->title) }}
                                                </h4>
                                            </div>

                                            <div class="mt-3 
                                                        application__slide border 
                                                        p-3
                                                        d-flex
                                                        align-items-center
                                                        justify-content-between">
                                                <div class="application__enter_answer">
                                                    {{ __('bsw.enter_answer') }}
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
                                                    @foreach($item->proffesionsStep1 as $key => $profession)
                                                        <div class="d-flex border p-2 position-relative">
                                                            <div class="p-2">
                                                                {{ Form::checkbox('proffessions_step_1_top_level='.$item->id.'[]', $profession->title, false, ['id' => 'proffessions_step_0_'.$item->id.'_'.$profession->id .'[]', 'class' => 'filed_checkbox']) }}
                                                            </div>

                                                            <div class="position-absolute w-100 h-100 top-0 start-0">
                                                                {{ Form::label('proffessions_step_0_'.$item->id.'_'.$profession->id .'[]', $profession->title, ['class' => 'w-100 h-100 d-flex align-items-center ps-5']) }}
                                                            </div>
                                                        </div>

                                                        @if($key === count($item->proffesionsStep1) - 1)
                                                            <div class="d-flex border p-2">
                                                                <label class="h-100 top-0 start-0 p-2 d-flex">
                                                                    <input type="checkbox" class="p-2 otherCheckbox" name="otherCheckbox">
                                                                    <div class="ps-3">
                                                                        სხვა:
                                                                    </div>
                                                                </label>
            
                                                                <div  style="display: none;" class="w-100 otherInputContainer">
                                                                    <input type="text" class="w-100 otherInput{{ $item->id }} otherInputBorder" name="otherInput{{ $item->id }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-10 p-0">
                                        <div class="text-danger 
                                                    file_field_second 
                                                    ps-2">
                                            {{ __('bsw.fill_field') }}
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
                                            {{ __('bsw.fill_field') }}
                                        </div>
                                    </div>
                                    
                                    <div class="application__button_second" data-id="2">
                                        {{ Form::button(__('bsw.next'), ['class' => 'px-5 py-2 fw-bold application__button_check btn__form']) }}
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
                                <div class="col-lg-10 application__label">
                                    <h4>
                                        {{ __('bsw.work_study_direction') }}
                                    </h4>
                                </div>

                                <div class="p-2 col-lg-10 position-relative">
                                    {{ Form::text('work_study_direction', old('work_study_direction'), ['class' => 'step_third_input', 'placeholder' => __('bsw.enter_answer')]) }}

                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>

                                <div class="col-lg-10 p-0">
                                    <div class="ps-2 file_field_third">
                                        <div class="text-danger border-danger">
                                            {{ __('bsw.fill_field') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-10 application__label">
                                    <h4>
                                        {{ __('bsw.work_study_name') }}
                                    </h4>
                                </div>

                                <div class="p-2 col-lg-10 position-relative">
                                    {{ Form::text('work_study_name', old('work_study_name'), ['class' => 'step_third_input', 'placeholder' => __('bsw.enter_answer')]) }}

                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>

                                <div class="col-lg-10 p-0">
                                    <div class="ps-2 file_field_third">
                                        <div class="text-danger border-danger">
                                            {{ __('bsw.fill_field') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-10 application__label">
                                    <h4>
                                        {{ __('bsw.why_want') }}
                                    </h4>
                                </div>

                                <div class="p-2 col-lg-10 position-relative">
                                    {{ Form::text('why_want', old('why_want'), ['class' => 'step_third_input', 'required' => 'required', 'placeholder' => __('bsw.enter_answer')]) }}

                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>

                                <div class="col-lg-10 p-0">
                                    <div class="ps-2 file_field_third">
                                        <div class="text-danger border-danger">
                                            {{ __('bsw.fill_field') }}
                                        </div>
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
                                            {{ __('bsw.fill_field') }}
                                        </div>
                                    </div>
                                    
                                    <div class="application__button_third" data-id="3">
                                        {{ Form::button(__('bsw.next'), ['class' => 'px-5 py-2 fw-bold btn__form']) }}
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
                                <div class="col-lg-10 application__label">
                                    <h4>
                                        {{ __('bsw.insert_email_address') }}
                                    </h4>
                                </div>

                                <div class="p-2 col-lg-10 position-relative">
                                    {{ Form::email('insert_email_address', old('insert_email_address'), ['required' => 'required', 'placeholder' => __('bsw.enter_answer'),
                                         'class' => 'step_forth_input mail_e']) }}

                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>

                                <div class="col-lg-10 p-0">
                                    <div class="ps-2
                                                text-danger"
                                                id="emailError" 
                                                data-unvalid="{{ __('bsw.enter_valid_email') }}" 
                                                data-required="{{ __('bsw.email_is_required') }}">
                                        
                                    </div>
                                </div>

                                <div class="col-lg-10 application__label">
                                    <h4>
                                        {{ __('bsw.insert_phone_number') }}
                                    </h4>
                                </div>

                                <div class="p-2 col-lg-10 position-relative">
                                    {{ Form::text('insert_phone_number', old('insert_phone_number'), ['required' => 'required', 'placeholder' => __('bsw.enter_answer'), 
                                        'class' => 'step_forth_input mobile_number']) }}

                                    <div class="position-absolute
                                                top-50
                                                translate-middle-y
                                                application__snowflake">
                                        <img src="{{ asset('/storage/images/flake.svg') }}">
                                    </div>
                                </div>

                                <div class="col-lg-10 p-0">
                                    <div class="ps-2
                                                text-danger"
                                                id="mobileError"
                                                data-number="{{__('bsw.number_is_required')}}"]
                                                data-number-correctly="{{__('bsw.number_is_correctly')}}">
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
                                            {{ __('bsw.fill_field') }}
                                        </div>
                                    </div>
                                    
                                    <div class="application__button_forth" data-id="4">
                                        {{ Form::button(__('bsw.next'), ['class' => 'px-5 py-2 fw-bold btn__form']) }}
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="application__page">
                            <div class="row
                                        d-flex 
                                        justify-content-center
                                        application__content">
                                @foreach ($questions2 as $item)
                                    <div class="col-lg-10 p-2">
                                        <div class=" w-100 position-relative">
                                            <div class="application__label">
                                                <h4>
                                                    {{ Form::label('proffessions_step_'.$item->id, $item->title) }}
                                                </h4>
                                            </div>

                                            <div class="mt-3 
                                                        application__slide border 
                                                        p-3
                                                        d-flex
                                                        align-items-center
                                                        justify-content-between">
                                                <div class="application__enter_answer">
                                                    {{ __('bsw.enter_answer') }}
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
                                                        bg-white 
                                                        w-100 
                                                        start-0">
                                                <div class="p-0">
                                                    @foreach($item->proffesionsStep1 as $key => $profession)
                                                        
                                                        <div class="d-flex border p-2 position-relative align-items-center">
                                                            <div class="p-2">
                                                                {{ Form::checkbox('proffessions_step_1_top_level='.$item->id.'[]', $profession->title, 
                                                                    false, ['id' => 'proffessions_step_0_'.$item->id.'_'.$profession->id .'[]', 'class' => 'filed_checkbox_sec']) }}
                                                            </div>

                                                            <div class="w-100 h-100 top-0 start-0 application__slide_box_rel">
                                                                {{ Form::label('proffessions_step_0_'.$item->id.'_'.$profession->id .'[]', $profession->title, ['class' => 'w-100 h-100 d-flex align-items-center ps-md-5 ps-2 pe-2']) }}
                                                            </div>
                                                        </div>

                                                        @if($key === count($item->proffesionsStep1) - 1)
                                                            <div class="d-flex border p-2">
                                                                <label class="h-100 top-0 start-0 p-2 d-flex">
                                                                    <input type="checkbox" class="p-2 otherCheckbox" name="otherCheckbox">
                                                                    <div class="ps-3">
                                                                        სხვა:
                                                                    </div>
                                                                </label>
            
                                                                <div  style="display: none;" class="w-100 otherInputContainer">
                                                                    <input type="text" class="w-100 otherInput{{ $item->id }} otherInputBorder" name="otherInput{{ $item->id }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-10 m-auto p-0">
                                        <div class="ps-2 file_field_fifth">
                                            <div class="text-danger border-danger">
                                                {{ __('bsw.fill_field') }}
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

                                        <div class="pe-3">
                                            {{ __('bsw.fill_field') }}
                                        </div>
                                    </div>
                                    
                                    <div class="application__submit position-relative">
                                        <div class="application__submit_submit 
                                                    position-absolute 
                                                    w-100 
                                                    h-100 
                                                    top-0 
                                                    start-0"></div>
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
