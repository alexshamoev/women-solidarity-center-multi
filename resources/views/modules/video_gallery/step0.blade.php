@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection


@section('content')
	<div class="container pb-2">
		@include('includes.tags', [
									'tag0Text' => $homePage->title,
									'tag0Url' => $homePage->fullUrl,
									'tag1Text' => $page->title,
								])
	</div>

	<div class="container
				main_section_padding
				p-2
				pt-0">
		

		<!-- <h2 class="p-2">
			{{ $page->title }}
		</h2> -->

		<div class="row">
			@foreach($videoGalleryStep0 as $data)
				<div class="col-xl-4 col-lg-6 p-2">
					<div class="border bg-white">
						<a href="{{ $data->fullUrl }}">
							<div class="block_border_video
										top-0">
								@if(isset($data->youtube_link))
									@php
										// parse v param value from youtube url
										parse_str(parse_url($data->youtube_link, PHP_URL_QUERY), $query_params);
										$video_query = $query_params['v'];
									@endphp
									<iframe class="video_gallery__video_home" src="https://www.youtube.com/embed/{{ $video_query }}?autoplay=0&mute=1&loop=1" width="100%" frameborder="0" loop allowfullscreen></iframe>
								@endif
							</div>
						</a>

						<div class="p-2">
							<div class="p-2">
								<h4 class="line_1">{{ $data->title }}</h4>
							</div>

							<div class="p-2">
								<div class="line_1 video__gallery_text_limit">
									{!! $data->text !!}
								</div>
							</div>
							
							<div class="d-flex justify-content-end p-2">
								<button class="border-0 bg-transparent see_more_js" data-text1="{{ __('bsw.read_more') }}" data-text2="{{__('bsw.show_less')}}">{{ __('bsw.read_more') }}</button>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="container p-md-0 p-3 pt-0">
		@include('modules.join_our_network.step0')
	</div>
@endsection