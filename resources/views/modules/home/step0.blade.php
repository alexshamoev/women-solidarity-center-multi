@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<!-- Vue -->
			<div id="app">
				<example title="Vue - {{ $page -> title }}"></example>
			</div>
		<!--  -->

		{{-- <!-- React -->
			<div id="examplereact" temp="eeee"></div>
		<!--  --> --}}

		@if(Session :: has('orderSuccessStatus'))
			<!-- Order status. -->
				<div class="p-2">
					<div class="alert alert-success m-0" role="alert">
						{{ Session :: get('orderSuccessStatus') }}
					</div>
				</div>
			<!--  -->
		@endif
		
		<div class="container home__main">
			@include('modules.animated_header.step0', $animatedHeader)
		</div>

		<h1 class="p-2">
			{{ __('bsw.news') }}
		</h1>
		
		<div class="col-sm-6 news__block_wrapper p-2 position-relative">
			<a href="{{ $eventPage->fullUrl }}">
				<div class="news__block 
							p-lg-0 
							p-5
							h-100 
							d-flex 
							justify-content-center 
							align-items-center">
					<div class="news__block_inner 
								d-flex 
								justify-content-center 
								align-items-center 
								p-5 
								h-auto">
						<img src="/storage/images/blog.svg" alt=""/>
					</div>
				</div>

				<div class="position-absolute news__block__title text-center">
					<h5 class="fw-bold">{{ __('bsw.events') }}</h5>
				</div>
			</a> 
		</div>

		<div class="col-sm-6 news__block_wrapper p-2 position-relative">
			<a href="{{ $publicationsPage->fullUrl }}">
				<div class="news__block 
							p-lg-0 
							p-5
							h-100 
							d-flex 
							justify-content-center 
							align-items-center">
					<div class="news__block_inner 
								d-flex 
								justify-content-center 
								align-items-center 
								p-5 
								h-auto">
						<img src="/storage/images/blog.svg" alt=""/>
					</div>
				</div>

				<div class="position-absolute news__block__title text-center">
					<h5 class="fw-bold">{{ __('bsw.publications') }}</h5>
				</div>
			</a> 
		</div>
		
		<div class="pertners pt-4">
			@include('modules.partners.step0')
		</div>

		<div class="container mt-5 bg-white p-md-0 p-3 pt-0">
			@include('modules.join_our_network.step0')
		</div>
	</div>
@endsection