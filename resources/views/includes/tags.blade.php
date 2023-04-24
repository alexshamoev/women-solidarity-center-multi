<div class="p-md-0 py-md-2 p-2 tags pb-md-0 pb-0">
	<div class="p-md-0 py-md-2 p-2 pb-md-0 pb-0">
		@if(isset($tag0Text))
			<div class="tags_wrapper">
				@if(isset($tag0Url))
					<a href="{{ $tag0Url }}">
						<span class="tags__element_main">
							{{ $tag0Text }}
						</span>
					</a>
				@else
					{{ $tag0Text }}
				@endif


				@if(isset($tag1Text))
					<span class="tags__slash">/</span>
					
					@if(isset($tag1Url))
						<a href="{{ $tag1Url }}">
							<span class="tags__element_main">
								{{ $tag1Text }}
							</span>
						</a>
					@else
						<span class="tags__page_name">
							@if($tag1Text)
								{{ $tag1Text }}
							@endif
						</span>
					@endif
				@endif


				@if(isset($tag2Text))
					<span class="tags__slash">/</span>

					@if(isset($tag2Url))
						<a href="{{ $tag2Url }}">
							<span class="tags__element_main">
								{{ $tag2Text }}
							</span>
						</a>
					@else
						@if($tag2Text)
							<span class="tags__page_name">
								{{ $tag2Text }}
							</span>
						@endif
					@endif
				@endif


				@if(isset($tag3Text))
					<span class="tags__slash">/</span>

					@if(isset($tag3Url))
						<a href="{{ $tag3Url }}">
							<span class="tags__element_main">
								{{ $tag3Text }}
							</span>
						</a>
					@else
						@if($tag3Text)
							<span class="tags__page_name">
								{{ $tag3Text }}
							</span>
						@endif
					@endif
				@endif


				@if(isset($tag4Text))
					<span class="tags__slash">/</span>

					@if(isset($tag4Url))
						<a href="{{ $tag4Url }}">
							<span class="tags__element_main">
								{{ $tag4Text }}	
							</span>
						</a>
					@else
						@if($tag4Text)
							<span class="tags__page_name">
								{{ $tag4Text }}
							</span>
						@endif
					@endif
				@endif
			</div>
		@endif
	</div>
</div>