@extends('master')

@section('pageMetaTitle'){{ $activePublication->metaTitle }}@endsection
@section('pageMetaDescription'){{ $activePublication->metaDescription }}@endsection
@section('pageMetaUrl'){{ $activePublication->metaUrl }}@endsection

@section('content')
	<div class="container main_section_padding">
		<div>
			@include('includes.tags', [
										'tag0Text' => $page->title,
										'tag0Url' => $page->fullUrl,
										'tag1Text' => $activePublication->title,
									])
		</div>

		<div class="container 
					publications__page_second 
					main_section_padding 
					p-2 
					pt-0">
			<h2 class="p-2 text-center pt-0">
				{{ $activePublication->title }}
			</h2>

			<div class="row d-flex justify-content-center">
				@if(file_exists(public_path('storage/images/modules/publications/88/'.$activePublication->id.'.jpg')))
					<div class="col-xl-10
								p-2">
						<img src="{{ asset('/storage/images/modules/publications/88/'.$activePublication->id.'.jpg') }}" alt="{{ $activePublication->title }}">
					</div>
				@endif
			</div>

			<div class="row d-flex justify-content-center">
				<div class="col-xl-10 p-0 position-relative publications__text_main">
					<div class="header__icons_parent
								position-absolute
								d-md-block
								d-none
								pt-2">
						<div class="publications__share_text d-flex align-items-center">
							<h5 class="fw-bold">
								{{__('bsw.share')}}
							</h5>
						</div>

						<div class="publications__vertical_line m-auto "></div>
						
						<div class="footer__social_border m-2">
							<div class="footer__social_box">
								<a href="https://facebook.com" target="_blank" class="footer__media_icon
											footer__media_icon--fb">
									<img src="{{ url('/') }}/storage/images/facebook_new.svg">
								</a>
							</div>
						</div>
						
						<div class="footer__social_border m-2">
							<div class="footer__social_box">
								<a href="https://twitter.com" target="_blank" class="footer__media_icon
											footer__media_icon--twitter">
									<img src="{{ url('/') }}/storage/images/twitter_new.svg">
								</a>
							</div>
						</div>

						<div class="footer__social_border m-2">
							<div class="footer__social_box">
								<a href="#" target="_blank" class="footer__media_icon
											footer__media_icon--linkedin">
									<img src="{{ url('/') }}/storage/images/youtube_new.svg" class="youtube">
								</a>
							</div>
						</div>

						<div class="footer__social_border m-2">
							<div class="pe-0 footer__social_box">
								<a href="https://instagram.com" target="_blank" class="footer__media_icon
											footer__media_icon--instagram">
									<img src="{{ url('/') }}/storage/images/instagram_new.svg">
								</a>
							</div>
						</div>
					</div>

					<div class="row d-flex justify-content-center">
						<div class="col-md-9 p-0">
							<div class="p-2">
								{!! $activePublication->headerText !!} 
							</div>

							<div class="p-2">
								<div class="p-2 work_rights__dark_text">
									<div class="p-2">
										{!! $activePublication->blackText !!}	
									</div>							
								</div>
							</div>

							<div class="p-2">
								{!! $activePublication->mainText !!} 
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="p-2 pt-5">
				@include('modules.join_our_network.step0')
			</div>
		</div>
	</div>
@endsection
