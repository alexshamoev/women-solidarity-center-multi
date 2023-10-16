@extends('master')

@section('pageMetaTitle'){{ $activeVideoGallery -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeVideoGallery -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeVideoGallery -> metaUrl }}@endsection 

@section('content')
	<div class="container
                p-2
                video_gallery_step_1">
		<div class="row">
			<div class="col-xl-11 col-sm-10 col-12 p-0">
                
                <div class="p-lg-4
                        pb-lg-5
                        p-0
                        pb-3">
                <div class="p-2">
                    <h1>
                        {{ $activeVideoGallery->title }} <br />
                    </h1>
                    <h3>
                        <div class="line_max_2">
                            {!! $activeVideoGallery->text !!} <br />
                        </div>	
                    </h3>
                </div>

                <div class="p-2">
                    <iframe class="p-2 video_gallery__video_home"
                            src="{{ getYoutubeEmbedUrl($activeVideoGallery->youtube_link) }}"
                            title="YouTube video player"
                            width="200px"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>
                
			</div>
		</div>
	</div>
@endsection