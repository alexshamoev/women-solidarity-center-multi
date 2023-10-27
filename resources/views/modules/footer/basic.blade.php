@if($widgetGetVisibility['footer'])
    <footer class="footer">
        <div class="container p-2">
            <div class="p-2">
                <div class="footer__horizontal_line"></div>
            </div>

            <div class="row">
                <div class="col-sm-6
                            d-flex
                            align-items-center
                            justify-content-sm-start
                            justify-content-center
                            p-0">
                    <a href="{{ $homePage->fullUrl }}">
                        <img class="footer__logo
                                    pb-sm-0 
                                    pb-2" src="{{ asset('/storage/images/logo.svg') }}" class="logo">
                    </a>
                </div>

                <div class="col-sm-6
                            col-12
                            p-0
                            d-flex
                            align-items-center
                            justify-content-sm-end
                            justify-content-center">
                    <div>
                        <h4 class="p-2 footer__title_input">
                            {{ __('bsw.subscribe') }}
                        </h4>

                        <div class="p-2 footer__email_input d-flex justify-content-end">

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
                </div>

                {{-- @foreach ($footerLinks as $data)
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
                @endforeach --}}
            </div>

            <div class="p-2">
                <div class="footer__horizontal_line"></div>
            </div>
                
            <div class="row d-flex justify-content-between">
                <div class="col-lg-4
                            col-12
                            p-2
                            text-white
                            d-flex
                            align-items-center
                            justify-content-lg-start
                            justify-content-center">
                        <span class="p-1 ps-0">Created by: </span>
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
                                <a href="{{ config('bsc.linkedin_link') }}"
                                    target="_blank"
                                    class="footer__media_icon
                                            footer__media_icon--linkedin">
                                    <img src="{{ asset('/storage/images/linkdin.svg') }}">
                                </a>
                            </div>
                        </div>

                        <div class="footer__social_border m-2">
                            <div class="footer__social_box">
                                <a href="{{ config('bsc.youtube_link') }}"
                                    target="_blank"
                                    class="footer__media_icon
                                            footer__media_icon--linkedin">
                                    <img src="{{ asset('/storage/images/youtube_new.svg') }}" class="youtube">
                                </a>
                            </div>
                        </div>

                        {{-- <div class="footer__social_border m-2">
                            <div class="pe-0 footer__social_box">
                                <a href="{{ config('bsc.instagram_link') }}"
                                    target="_blank"
                                    class="footer__media_icon
                                            footer__media_icon--instagram">
                                    <img src="{{ asset('/storage/images/instagram_new.svg') }}">
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <a href="/admin" target="_blank">
            <div class="footer__admin_button"></div>
        </a>
    </footer>
@endif