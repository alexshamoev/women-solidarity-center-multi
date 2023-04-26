@if($widgetGetVisibility['header'])
    <div class="container 
                py-lg-2 
                px-md-0 
                p-2">
        <div class="row 
                    d-flex 
                    align-items-center">
            <div class="col-xxl-1 
                        col-lg-2 
                        col-4 
                        p-2 
                        ps-md-0  
                        fw-bold 
                        fs-3">
                {{ __('bsw.site_short_name') }}
            </div>

            <div class="col-xxl-9
                        col-lg-7 
                        order-lg-0
                        order-1
                        px-md-0
                        py-2
                        p-2 
                        header__top_search 
                        d-flex 
                        justify-content-center">
                <div class="position-relative 
                            p-2 border 
                            header__search_box">
                    <span class="ba_search_newest
                                position-absolute 
                                header__top_icon 
                                top-50 
                                translate-middle">
                    </span>

                    <input class="h-100 
                                w-100 
                                border-0 
                                p-0 
                                position-absolute 
                                top-0 
                                start-0 
                                ps-5" 
                                type="text" 
                                placeholder="{{ __('bsw.search') }}">
                    <button class="position-absolute
                                    border-0 
                                    header__search_btn
                                    p-2
                                    text-white">
                        {{ __('bsw.search') }}
                    </button>
                </div>
            </div>

            <div class="col-xxl-2 
                        col-lg-3
                        d-flex 
                        align-center 
                        justify-content-end
                        p-0
                        col-8">
                <div class="d-flex
                            align-center
                            justify-content-lg-end
                            justify-content-center
                            header__icons_parent">
                    <div class="header__social_border m-2">
                        <div class="header__social_box">
                            <a href="{{ config('bsc.facebook_link') }}"
                                target="_blank"
                                class="header__media_icon
                                        header__media_icon--fb">
                                <img src="{{ asset('/storage/images/facebook_new.svg') }}">
                            </a>
                        </div>
                    </div>
                        
                    <div class="header__social_border m-2">
                        <div class="header__social_box">
                            <a href="{{ config('bsc.twitter_link') }}"
                                target="_blank"
                                class="header__media_icon
                                        header__media_icon--twitter">
                                <img src="{{ asset('/storage/images/twitter_new.svg') }}">
                            </a>
                        </div>
                    </div>

                    <div class="header__social_border m-2">
                        <div class="header__social_box">
                            <a href="#"
                                target="_blank"
                                class="header__media_icon
                                        header__media_icon--linkedin">
                                <img src="{{ asset('/storage/images/youtube_new.svg') }}" class="youtube">
                            </a>
                        </div>
                    </div>

                    <div class="header__social_border m-2 me-md-0">
                        <div class="pe-0 header__social_box">
                            <a href="{{ config('bsc.instagram_link') }}"
                                target="_blank"
                                class="header__media_icon
                                        header__media_icon--instagram">
                                <img src="{{ asset('/storage/images/instagram_new.svg') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3">   
        <header class="header container position-relative">
            <div class="container p-xl-0 pe-xl-2 p-2 ps-xxl-2">
                <!-- React search -->
                    <div id="examplereact"></div>
                <!--  -->

                <div class="row">
                    <div class="d-flex
                                align-items-center
                                justify-content-between
                                row">
                        <!-- <div class="col-6">
                            <span>{{ __('bsw.phone_number') }}: {{ config('bsc.phone_number') }}</span>
                        </div> -->

                        {{-- @if(Auth :: check())
                            <div class="col-2">
                                {{ Auth :: user() -> name }}
                            </div>
                    
                            <div class="col-2">
                                <a href="{{ route('logout', $language->title) }}">
                                    Logout
                                </a>
                            </div>

                            <div class="col-2">
                                <a href="{{ '/'.$language -> title.'/'.$basketPage -> alias }}">
                                    Basket Icon
                                </a>
                            </div>
                        @else
                            <div class="col-3">
                                <a href="{{ route('getRegister', $language->title) }}">
                                    {{ __('auth.register') }}
                                </a>
                            </div>

                            <div class="col-3">
                                <a href="{{ route('getLogin', $language->title) }}">
                                    {{ __('auth.login') }}
                                </a>
                            </div>
                        @endif --}}
                    </div>

                    <!-- <div class="col-xl-1
                                        col-md-2
                                        col-3
                                        header position-relative__logo
                                        order-0">
                        <div class="pe-2">
                            <a href="{{ '/'.app() -> getLocale() }}">
                                <img src="{{ asset('/storage/images/admin/logo.svg') }}">
                            </a>
                        </div>
                    </div> -->

                    <nav class="navbar
                                col-12
                                navbar-expand-xl
                                navbar-light
                                p-0">
                        <div class="row
                                    w-100
                                    d-flex
                                    align-items-center">
                            <div class="col-md-1
                                        d-flex
                                        align-items-center
                                        col-6
                                        p-0
                                        d-xl-none
                                        d-block
                                        order-1">
                                <div class="header
                                            position-relative__mobNav
                                            d-flex
                                            justify-content-end">
                                    <button class="border-0 
                                                    bg-transparent
                                                    p-2
                                                    d-block"
                                            type="button"
                                            data-bs-target="#navbar"
                                            aria-controls="navbarNav"
                                            aria-expanded="false" 
                                            aria-label="Toggle navigation">
                                            <div class="text-warning icon_box navbar-toggler border-0">
                                                <div class="group_1"></div>
                                                <div class="group_2"></div>
                                                <div class="group_3"></div>
                                                <div class="group_4"></div>
                                            </div>
                                    </button> 
                                </div>

                                <div class="p-2 header__categories_text">
                                    <span>კატეგორიები</span>
                                </div>
                            </div>

                            <div class="col-xl-9
                                        col-12
                                        p-0
                                        order-xl-1
                                        order-3">
                                @include('modules.menu_buttons.basic')
                            </div>
                            
                            <div class="col-xxl-2
                                        col-xl-3
                                        col-6
                                        ms-auto
                                        d-block
                                        order-xl-3
                                        order-2
                                        p-0">
                                @include('modules.languages.basic')
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
    </div>
@endif