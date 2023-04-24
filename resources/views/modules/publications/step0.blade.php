@extends('master')

@section('pageMetaTitle'){{ $page->metaTitle }}@endsection
@section('pageMetaDescription'){{ $page->metaDescription }}@endsection
@section('pageMetaUrl'){{ $page->metaUrl }}@endsection

@section('content')
	<div class="container publications main_section_padding">
		<div>
			@include('includes.tags', [
				'tag0Text' => $homePage->title,
				'tag0Url' => $homePage->fullUrl,
				// 'tag1Text' => $resourcesPage->title,
				// 'tag1Url' => $resourcesPage->fullUrl,
				'tag2Text' => $page->title
			])
		</div>

		<div class="row p-2">
			@foreach($publicationsStep0 as $data)
				<div class="col-lg-4 
							col-md-6 
							col-12 
							p-2">
					@if(file_exists(public_path('storage/images/modules/publications/88/'.$data->id.'.jpg')))
						@include('includes.block_with_border', [
																'icon' => asset('/storage/images/arrow.svg'),
																'photo' => asset('/storage/images/modules/publications/88/'.$data->id.'_preview.jpg'),
																'headline' => $data->datetime,
																'title' => $data->title,
																'description' => $data->text  ,
																'link' => $data->fullUrl,
																'arrow' => true,
														])
					@endif
				</div>
			@endforeach
		</div>

		<div class="container mt-3 bg-white p-md-0 p-3">
			{{-- @include('modules.join_our_network.step0') --}}
		</div>
	</div>
@endsection