@extends('master')


@section('pageMetaTitle')
    Home
@endsection


@section('content')
<div class="container">
	<div class="p-2">
		<div class="p-2">
			<h1 class="text-center">
				Static page - 

				{{ $page -> title }}
			</h1>
		</div>

		<div class="p-2">
			{!! $page -> text !!} 
		</div>

		{{--
		<div class="p-2">
			BSC Sample: {{ $bsc -> a_folders_url }}
		</div>

		<div class="p-2">
			BSW Sample: {{ $bsw -> a_add_image }}
		</div>
		--}}
	</div>
</div>
@endsection


@section('menu')
    <div class="p-2">
        Menu on Home
    </div>


    @parent
@endsection