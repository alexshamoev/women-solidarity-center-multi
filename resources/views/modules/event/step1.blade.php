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
			<h2 class="p-2 text-center">
                {{ $activeEvent->title }}
			</h2>

			<div class="row d-flex justify-content-center">
                <div class="col-xl-10
                            p-2">
                    <img src="{{ asset('/storage/images/modules/event/81/'.$activeEvent->id.'.jpg') }}" alt="{{ $activeEvent->title }}"/>
                </div>
			</div>

			<div class="row d-flex justify-content-center">
				<div class="col-xl-10 p-0 position-relative stem__text_main">
					<div class="header__icons_parent
								position-absolute
								d-md-block
								d-none
								pt-2">
						<div class="stem__share_text d-flex align-items-center">
							<h5 class="fw-bold">
								{{__('bsw.share')}}
							</h5>
						</div>

						<div class="stem__vertical_line m-auto "></div>
						
						<div class="footer__social_border m-2">
							<div class="footer__social_box">
								<a href="https://facebook.com" target="_blank" class="footer__media_icon
											footer__media_icon--fb">
									<img src="http://127.0.0.1:8000/storage/images/facebook_new.svg">
								</a>
							</div>
						</div>
						
						<div class="footer__social_border m-2">
							<div class="footer__social_box">
								<a href="https://twitter.com" target="_blank" class="footer__media_icon
											footer__media_icon--twitter">
									<img src="http://127.0.0.1:8000/storage/images/twitter_new.svg">
								</a>
							</div>
						</div>

						<div class="footer__social_border m-2">
							<div class="footer__social_box">
								<a href="#" target="_blank" class="footer__media_icon
											footer__media_icon--linkedin">
									<img src="http://127.0.0.1:8000/storage/images/youtube_new.svg" class="youtube">
								</a>
							</div>
						</div>

						<div class="footer__social_border m-2">
							<div class="pe-0 footer__social_box">
								<a href="https://instagram.com" target="_blank" class="footer__media_icon
											footer__media_icon--instagram">
									<img src="http://127.0.0.1:8000/storage/images/instagram_new.svg">
								</a>
							</div>
						</div>
					</div>
                    
					<div class="row d-flex justify-content-center">
						<div class="col-md-9 p-0">
                            <div class="py-3 px-2 pb-2">
                                <a href="{{ $activeEvent->register_link }}" target="_blank">
                                    <button class="events__registration_btn border-0">
                                        <h5 class="fw-bold px-3 p-2">
                                          {{__('bsw.registration')}}
                                        </h5>
                                    </button>
                                </a>
                            </div>

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