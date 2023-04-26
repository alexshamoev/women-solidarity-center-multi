<div class="languages
			d-flex
			align-items-center
			justify-content-end">
	@foreach($languages as $data)
		@if($data -> isActive)
			<div class="languages__block
						languages__block--active
						text-end
						p-2">
				<!-- <div class="p-2">
					<img src="{{ asset('/storage/images/modules/languages/'.$data -> id.'.svg') }}" alt="{{ $data -> full_title }}" >
				</div> -->

				<div class="p-0">
					{{ $data -> full_title }}
				</div>
			</div>
		@else
			<div class="languages__block
						text-center
						p-2">
				<a href="{{ $data -> fullUrl }}">
					<div class="">
						<!-- <img src="{{ asset('/storage/images/modules/languages/'.$data -> id.'.svg') }}" alt="{{ $data -> full_title }}" > -->
					</div>

					<div class="p-0 language_initials">
						{{ $data -> full_title }}
					</div>
				</a>
			</div>
		@endif
	@endforeach
</div>