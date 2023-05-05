@if($widgetGetVisibility['footer'])
    <footer class="footer">
        <div class="container p-2">
            <div class="d-lg-flex
                        justify-content-between">
                <div class="p-2
                        d-lg-flex
                        align-items-center
                        text-white">
                    <img class="footer__logo" src="{{ asset('/storage/images/logo.svg') }}" class="logo">
                    {{ $homePage->fullUrl }}
                </div>
                <!-- <div class="d-flex align-items-center">
                    <div class="p-2 text-white">
                        {{ __('bsw.want_to_join') }}
                    </div>
                    <div class="p-2">
                        <div class="footer__submit">
                            {{ Form::submit( __('bsw.join')) }}
                        </div>
                    </div>
                </div> -->
            </div>
                <div class="p-2">
                    <div class="footer__horizontal_line"></div>
                </div>
            <div class="row">
                <div class="col-xl-3
                            col-lg-6
                            col-12
                            p-0">
                    <h4 class="p-2 footer__title_input">
                        {{ __('bsw.subscribe') }}
                    </h4>
                    <div class="p-2 footer__email_input">

                        {{ Form::open(array('route' => 'subscribe', 'method' => 'POST')) }}

                            {{ Form::email('email_subscribe', old('email_subscribe'), array(
                                                                                        'placeholder' => __('bsw.email'), 
                                                                                        'required' => 'required', 
                                                                                        'pattern' =>  '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$',
                                                                                        'title' => 'yourname@example.com',
                                                                                        )) }}

                            <!-- {{ Form::submit('<div></div>', ['class' => 'btn btn-primary']) }} -->
                            <button type="submit" class="footer__btn_submit">
                                <span class="ba_thin_arrow_right"></span>
                            </button>

                            {{-- @error('email_subscribe')
                                <div class="alert alert-danger m-0">
                                    {{ $message }}
                                </div>
                            @enderror --}}

                        {{ Form::close() }}

                    </div>
                </div>

                @foreach ($footerLinks as $data)
                    <div class="col-lg-3
                                col-6
                                pt-lg-0
                                pt-3
                                p-0">

                        @if ($data->url)
                            <a href="{{ $data->url }}" target="{{ $data->urlTarget }}">
                                <h4 class="p-2 footer__title">
                                    {{ $data->title }}
                                </h4>
                            </a>
                        @else
                            <h4 class="p-2 footer__title">
                                {{ $data->title }}
                            </h4>
                        @endif
                        
                        @foreach($data->footerLinksStep1 as $dataInside)
                            @if($dataInside->url)
                                <div class="p-2">
                                    <a href="{{ $dataInside->url }}" target="{{ $dataInside->urlTarget }}">
                                        <span class="footer__elements">
                                            {{ $dataInside->title }}
                                        </span>
                                    </a>
                                </div>
                            @else
                                <div class="p-2">
                                    <span class="footer__elements">
                                        {{ $dataInside->title }}
                                    </span>
                                </div>
                            @endif
                        @endforeach
                     </div>
                @endforeach
            </div>

            <div class="p-2">
                <div class="footer__horizontal_line"></div>
            </div>
                
            <div class="row">
                <div class="col-lg-4
                            col-12
                            p-0
                            text-lg-start
                            text-center
                            d-flex
                            align-items-center
                            justify-content-lg-start
                            justify-content-center">
                    <a href="{{ $termsPage->fullUrl }}">
                        <span class="p-2
                                    footer__bottom_el">
                            {{ $termsPage->title }}
                        </span>
                    </a>
                    <a href="{{ $privacyPage->fullUrl }}">
                        <span class="p-2
                                    footer__bottom_el">
                            {{ $privacyPage->title }}
                        </span>
                    </a>
                </div>
                <div class="col-lg-4
                            col-12
                            p-0
                            text-white
                            d-flex
                            align-items-center
                            justify-content-center">
                        <span class="p-1">Created by: </span>
                        <a href="http://hobbystudio.ge/" target="_blank">
                            <span class="footer__bottom_el">HobbyStudio</span>
                        </a>
                </div>
                <div class="col-lg-4
                            col-12
                            text-lg-start
                            text-center
                            p-0">
                    <div class="d-flex
                                align-center
                                justify-content-lg-end
                                justify-content-center
                                header__icons_parent">
                        <div class="footer__social_border m-2">
                            <div class="footer__social_box">
                                <a href="{{ config('bsc.facebook_link') }}"
                                    target="_blank"
                                    class="footer__media_icon
                                            footer__media_icon--fb">
                                    <img src="{{ asset('/storage/images/facebook_new.svg') }}">
                                </a>
                            </div>
                        </div>
                        
                        <div class="footer__social_border m-2">
                            <div class="footer__social_box">
                                <a href="{{ config('bsc.twitter_link') }}"
                                    target="_blank"
                                    class="footer__media_icon
                                            footer__media_icon--twitter">
                                    <img src="{{ asset('/storage/images/twitter_new.svg') }}">
                                </a>
                            </div>
                        </div>

                        <div class="footer__social_border m-2">
                            <div class="footer__social_box">
                                <a href="#"
                                    target="_blank"
                                    class="footer__media_icon
                                            footer__media_icon--linkedin">
                                    <img src="{{ asset('/storage/images/youtube_new.svg') }}" class="youtube">
                                </a>
                            </div>
                        </div>

                        <div class="footer__social_border m-2">
                            <div class="pe-0 footer__social_box">
                                <a href="{{ config('bsc.instagram_link') }}"
                                    target="_blank"
                                    class="footer__media_icon
                                            footer__media_icon--instagram">
                                    <img src="{{ asset('/storage/images/instagram_new.svg') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/admin" target="_blank">
            <div class="footer__admin_button"></div>
        </a>
    </footer>
@endif