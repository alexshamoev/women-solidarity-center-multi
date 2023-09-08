@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="container events main_section_padding">
		<div class="pb-3">
			@include('includes.tags', [	
				'tag0Text' => $homePage->title,
				'tag0Url' => $homePage->fullUrl,
				'tag1Text' => $page->title
			])
		</div>

		<div class="container">
			@if (count($plannedEvents) > 0)
				<div>
					<h2 class="p-md-0 px-3">{{ __('bsw.planned') }}</h2>
				</div>
				
				<div class="row">
					@foreach($plannedEvents as $data)
						<div class="col-12 
									py-md-3
									p-0  
									events__block_new">
							<div class="position-relative events__active_events p-md-0 p-3">
								<div class="events__image">
									<img src="{{ asset('/storage/images/modules/event/81/'.$data->id.'.jpg') }}" alt="{{ $data->title }}"/>
								</div>

								<div class="position-absolute 
											bottom-0 
											p-lg-5 
											p-md-4 
											p-sm-3 
											p-2
											events__free_block">
									<h2 class="events__planned__event_title p-2">{{ $data->title }}</h2>

									<div class="events__planned__event_text p-2">
										<div class="line_3">
											{!! $data->text !!}
										</div>
									</div>

									<div class="p-2 
												d-flex 
												align-items-center 
												events__planned_btns">
										<div class="pe-2">
											<a href="{{ $data->fullUrl }}">
												<button class="p-3 
																events__planned_event_btn">
													<h5 class="fw-bold">{{ __('bsw.more') }}</h5>
												</button>
											</a>
										</div>
										
										@if ($data->event_date >= date('Y-m-d H:i:s') && !empty($data->register_link))
											<div class="ps-2">
												<a href="{{ $data->register_link }}" target="_blank">
													<button class="p-3
																	events__planned_registration_btn">
														<h5 class="fw-bold">{{ __('bsw.registration') }}</h5>
													</button>
												</a>
											</div>
										@endif
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			@endif
			
			@if (count($oldEvents) > 0)
				<div>
					<h2 class="px-md-0 px-3 pt-3">{{ __('bsw.conducted_events') }}</h2>

					<div class="row p-2">
						@foreach($oldEvents as $data)
							<div class="col-xl-4
										col-md-6
										col-12
										p-2">
								@include('includes.block_with_border', [
																		'icon' => asset('/storage/images/arrow.svg'),
																		'photo' => asset('/storage/images/modules/event/81/'.$data->id.'_last_ev.jpg'),
																		'headline' => $data->event_date,
																		'title' => $data->title,
																		'description' => $data->text ,
																		'link' => $data->fullUrl,
																		'arrow' => true,
																		'address' => $data->address,
																	])
							</div>
						@endforeach
					</div>
				</div>
			@endif
			
			<div class="container 
						pt-0
						p-md-0
						p-3">
				@include('modules.join_our_network.step0')
			</div>
		</div>
	</div>
@endsection

