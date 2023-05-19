@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="container main_section_padding">
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

		@if(Session::has('subscribe-success'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session::get('subscribe-success') }}
				</div>
			</div>
		@endif

        @if(Session::has('subscribe-error'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session::get('subscribe-error') }}
				</div>
			</div>
		@endif
		
		<div class="container home__main px-md-0 px-3">
			@include('modules.animated_header.step0', $animatedHeader)
		</div>

		<h1 class="p-2">
			
		</h1>
		
		<div class="container">
			<div class="news row mb-5">
				<div class="news__header_wrapper 
							col-12 
							text-center 
							p-0 
							my-3 
							pt-2">
					@include('includes.pages_headers', [
											'title' => __('bsw.news') ,
										])
				</div>

				<div  class="row p-2 pt-0">
					<div class="col-lg-6 col-12 p-0">
						<div class="row gx-2 gy-2 h-100">
							<div class="col-sm-6 
                                    news__block_wrapper 
                                    p-2 
                                    position-relative">
								<a href="{{ $eventPage->fullUrl }}">
									<div class="news__block 
												p-lg-0 
												p-5
												h-100 
												d-flex 
												justify-content-center 
												align-items-center"
												data-id="1">
										<div class="news__block_inner 
													d-flex 
													justify-content-center 
													align-items-center 
													p-5 
													h-auto">
											<img src="/storage/images/advices.svg" alt=""/>
										</div>
									</div>

									<div class="position-absolute news__block__title text-center">
										<h5 class="fw-bold">{{ $eventPage->title }}</h5>
									</div>
								</a>
							</div>

							<div class="col-sm-6 
                                    news__block_wrapper 
                                    p-2 
                                    position-relative">
								<a href="{{ $publicationsPage->fullUrl }}">
									<div class="news__block 
												p-lg-0 
												p-5
												h-100 
												d-flex 
												justify-content-center 
												align-items-center"
												data-id="2">
										<div class="news__block_inner 
													d-flex 
													justify-content-center 
													align-items-center 
													p-5 
													h-auto">
											<img src="/storage/images/advices.svg" alt=""/>
										</div>
									</div>

									<div class="position-absolute news__block__title text-center">
										<h5 class="fw-bold">{{ $publicationsPage->title }}</h5>
									</div>
								</a>
							</div>
						</div>
					</div>

					<!-------------- Information that appears on hover in news line ------------->
					<div class="col-lg-6 
								col-12 
								news__info 
								news__info_active" 
								data-id="1">
						<a href="{{ $lastEvent->fullUrl }}">
							<div class="news__image">
								<div>
									<img class="" src="{{ asset('/storage/images/modules/event/81/'.$lastEvent->id.'_last_ev.jpg') }}" alt="{{ $lastEvent->title }}"/>
								</div>
								
								<div class="news__image_description p-2">
									<h4 class="news__image_description_title p-2">
										{{ $lastEvent->title }}
									</h4>

									<div class="p-2">
										<div class="news__image_description_text p-2 line_max_5">
											{!! $lastEvent->text !!}
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-lg-6 
								col-12 
								news__info" 
								data-id="2">
						<a href="{{ $lastPublication->fullUrl }}">
							<div class="news__image">
								<div>
									<img src="{{ asset('/storage/images/modules/publications/88/'.$lastPublication->id.'_preview.jpg') }}" alt="{{ $lastPublication->title }}"/>
								</div>
								
								<div class="news__image_description p-2">
									<h4 class="news__image_description_title p-2">
										{{ $lastPublication->title }}
									</h4>

									<div class="p-2">
										<div class="news__image_description_text p-2 line_max_5">
											{!! $lastPublication->header_text !!} 
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="about_us
                    mb-5 
                    row
                    p-3">
            <div class="about_us__image 
                        col-xl-8 
                        col-12 
                        p-0">
                <div class="row about_us__stripe">
                    <div class="col-7 
                                about_us__stripe_white 
                                p-xl-4 
                                p-0"></div>
                    <div class="col-5 
                                about_us__stripe_blue 
                                p-xl-4 
                                p-0"></div>
                </div>

                <div class="row 
                            about_us__image_wrapper  
                            ps-0 
                            pt-0 
                            pe-md-5 
                            pb-md-5
                            pe-4
                            pb-4">
                    <img class="about_us__big_image" src="{{ asset('/storage/images/modules/about_us/93/'.$aboutPage->id.'_preview.jpg') }}" alt="{{ $aboutPage->title }}"/>
                </div>
            </div>

            <div class="about_us__description
                        col-xl-4
                        col-12
                        items-end
                        justify-content-center
                        p-sm-4
                        p-2
                        position-relative">
                <div class="row 
                            about_us__stripe_blue 
                            p-lg-3 
                            p-0">
                </div>

                <div class="about_us__text 
                            px-md-3 
                            px-2 
                            h-100 
                            w-100">
                    <h2 class="about_us__description_text p-2" >
                        {{ $aboutPage->title }}
                    </h2>

                    <div class="about_us__description_text p-2">
                        {!! $aboutPage->text !!}
                    </div>

                    <div class="p-2">
                        <div class="col-xxl-8
                                    col-xl-10
                                    col-lg-4
                                    col-sm-6
                                    col-10
                                    p-0
                                    yellow_button">
                            @include('includes.button_yellow', [
                                                'title' => __('bsw.join_team'),
                                                'link' => $aboutPage->fullUrl,
                                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="pertners pt-4">
			@include('modules.partners.step0')
		</div>

		<div class="container mt-5 bg-white p-3 ">
			@include('modules.join_our_network.step0')
		</div>
	</div>
@endsection