@if($widgetGetVisibility['partners'])
	<div class="container
				p-2
				partners">
		<h5 class="p-2 fw-bold text-center">
			{{ __('bsw.sponsors') }}
		</h5>

		<div class="row d-flex justify-content-sm-between justify-content-center">
			@foreach($partners as $data)
				<div class="partners__logo">
					<a href="{{ $data->link }}" target="_blank">
						<div class="p-2">
							<img src="{{ asset('/storage/images/modules/partners/31/'.$data->id.'.png') }}" alt="{{ $data->title }}">
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endif