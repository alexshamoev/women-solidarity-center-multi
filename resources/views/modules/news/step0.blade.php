@extends('master')


@section('pageMetaTitle')
	{{ $page -> title }}
@endsection


@section('content')
	<div class="container p-2 main_content--height">
		<h1 class="p-2">
			{{ $page -> title }}
		</h1>

		<div class="p-2">
			{!! $page -> text !!}
		</div>

		<div class="row">
			@foreach($newsStep0 as $data)
				<div class="col-3">
					<a href="{{ $data -> fullUrl }}">
						<div class="p-2">
							<img src="{{ asset('/storage/images/modules/news/step_0/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
						</div>

						<h3 class="p-2">
							{{ $data -> title }}
						</h3>
						
						<div class="p-2">
							<div class="line_5">
								{!! $data -> text !!}
							</div>
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection