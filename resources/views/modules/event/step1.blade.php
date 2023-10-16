    @extends('master')

    @section('pageMetaTitle'){{ $activeEvent -> metaTitle }}@endsection
    @section('pageMetaDescription'){{ $activeEvent -> metaDescription }}@endsection
    @section('pageMetaUrl'){{ $activeEvent -> metaUrl }}@endsection

    @section('content')
        <div class="events__page_second main_section_padding">
            <div class="container">
                @include('includes.tags', [
                    'tag0Text' => $homePage->title,
                    'tag0Url' => $homePage->fullUrl,
                    'tag1Text' => $page->title,
                    'tag1Url' => $page->fullUrl,
                    'tag2Text' => $activeEvent->title,
                ])
            </div>

            <div class="container 
					stem__page_second 
					main_section_padding 
					p-2">
			<!-- <h2 class="p-2 text-center">
                {{ $activeEvent->title }}
			</h2> -->

			<div class="row d-flex">
                <div class="col-xl-11
                            m-auto
                            p-2
                            events__img_second
                            position-relative">
                    <img src="{{ asset('/storage/images/modules/event/81/'.$activeEvent->id.'.jpg') }}" alt="{{ $activeEvent->title }}"/>
                </div>
			</div>

			<div class="row d-flex justify-content-center pt-xl-5">
				<div class="col-xl-10 p-0 position-relative stem__text_main">
                    @include('includes.social_icons', [
                                                            'ImgUrl1' => asset('/storage/images/facebook_new.svg'),
                                                            'ImgUrl2' => asset('/storage/images/linkdin.svg'),
                                                            'ImgUrl3' => asset('/storage/images/youtube_new.svg'),
                                                        ])
                    
					<div class="row d-flex justify-content-center">
						<div class="col-md-9 p-0">
                            
                            @if (!empty($activeEvent->register_link) && $activeEvent->event_date >= date('Y-m-d'))
                                <div class="p-2">
                                    <a href="{{ $activeEvent->register_link }}" target="_blank">
                                        <button class="events__registration_btn border-0">
                                            <h5 class="fw-bold px-3 p-2">
                                            {{__('bsw.registration')}}
                                            </h5>
                                        </button>
                                    </a>
                                </div>
                            @endif

                            <div class="p-2">
                                {!! $activeEvent->text !!}	
                            </div>

							<div class="p-2">
                                <span class="fw-bold">
                                    {{__('bsw.address')}}:
                                </span>

                                <span>
                                    {{ $activeEvent->address }} 
                                </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
            
            @if ($activeEvent->eventStep1->count() > 0)
                <div class="container p-2">
                    <div class="owl-carousel owl-theme event_images_carousel">
                        @foreach($activeEvent->eventStep1 as $data)
                                {{-- <figure itemprop="associatedMedia" class="col-sm-6 "> --}}
                                    <a href="{{ asset('/storage/images/modules/event/96/'.$data->id.'.jpg') }}" data-size="2000x1200"
                                    data-med="{{ asset('/storage/images/modules/event/96/'.$data->id.'.jpg') }}" data-med-size="2000x1200">
                                        <img src="{{ asset('/storage/images/modules/event/96/'.$data->id.'_preview.jpg') }}" itemprop="thumbnail" alt="{{ $data->title }}"/>
                                    </a>
                                    {{-- <figcaption class="d-none" itemprop="{{ $data->title }}">{{ $data->title }}</figcaption> --}}
                                {{-- </figure> --}}
                        @endforeach
                    </div>
                </div>
            @endif
            {{--
            <div class="container">
                <div class="stem_wrapper mb-4">
                    <div class="news__header_wrapper 
                                col-12 
                                text-center 
                                p-0 
                                my-3 
                                pt-2">
                        @include('includes.pages_headers', [
                                                        'title' => $careerPage->title ,
                                                    ])

                    </div> 

                    <div class="row news_wrapper p-2">
                        @foreach ($career as $item)
                            <div class="col-lg-4 
                                        col-md-6 
                                        col-sm-12 
                                        p-2">
                                @include('includes.block_with_border', [
                                        'icon' => asset('/storage/images/arrow.svg'),
                                        'photo' => asset('/storage/images/modules/career/94/'.$item->id.'_preview.jpg'),
                                        'headline' => 'სიახლეები',
                                        'title' => $item->title,
                                        'description' => $item->header_text ,
                                        'link' => $item->fullUrl,
                                        'arrow' => true,
                                    ])
                            </div>
                        @endforeach
                    </div>

                    <div class="row d-flex justify-content-center">
                        @include('includes.button_with_arrow', [
                                        'title' => __('bsw.see_all') ,
                                        'link' => $careerPage->fullUrl,
                                    ])
                    </div>
                </div>  
            </div>
            --}}

            <div class="container 
                        mt-5 
                        bg-white 
                        p-md-0 
                        p-3 
                        pt-0">
                @include('modules.join_our_network.step0')
            </div>
        </div>
    @endsection