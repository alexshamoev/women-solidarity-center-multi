<div class="header__icons_parent
            position-absolute
            d-md-block
            d-none
            p-0">
    <div class="events__share_text d-flex align-items-center">
        <h5 class="fw-bold">
            {{__('bsw.share')}}
        </h5>
    </div>

    <div class="events__vertical_line m-auto "></div>
    
    <div class="footer__social_border m-2">
        <div class="footer__social_box">
            <a href="{{ config('bsc.facebook_link') }}"
                target="_blank"
                class="footer__media_icon
                        footer__media_icon--fb">
                <img src="{{ $ImgUrl1 }}">
            </a>
        </div>
    </div>
    
    <div class="footer__social_border m-2">
        <div class="footer__social_box">
            <a href="{{ config('bsc.linkedin_link') }}"
                target="_blank"
                class="footer__media_icon
                        footer__media_icon--linkedin">
                <img src="{{ $ImgUrl2 }}">
            </a>
        </div>
    </div>

    <div class="footer__social_border m-2">
        <div class="footer__social_box">
            <a href="{{ config('bsc.youtube_link') }}"
                target="_blank"
                class="footer__media_icon
                        footer__media_icon--youtube">
                <img src="{{ asset('/storage/images/youtube_new.svg') }}" class="youtube">
            </a>
        </div>
    </div>
</div>