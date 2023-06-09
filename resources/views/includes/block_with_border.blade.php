<div class="block_with_border h-100">
    @isset($link)
        <a href="{{ $link }}">
    @endisset
        <div class="position-relative">
            <div class="block_border_image overflow-hidden">
                <img class="" src="{{ $photo }}" alt="" />
            </div>
            
            @if(isset($youtube_link))
                @php
                    // parse v param value from youtube url
                    parse_str(parse_url($youtube_link, PHP_URL_QUERY), $query_params);
                    $video_query = $query_params['v'];
                @endphp
                
                <div class="block_border_video 
                            position-absolute 
                            h-100 
                            w-100 
                            top-0">
                    <iframe src="https://www.youtube.com/embed/{{ $video_query }}?autoplay=1&mute=1&loop=1" width="100%" height="100%" frameborder="0" loop allowfullscreen></iframe>
                </div>
            @endif
            
        </div>
        
        <div class="p-2">
            @if(isset($headline))
                <h5 class="p-2 fst-italic">{{ $headline }}</h5>
            @endif

            @if(isset($title) && $title)
                <div class="p-2 block_with_border__title">
                    <h4 class="line_1">{{ $title }}</h4>
                </div>
            @endif

            <div class="block_with_border__detail d-flex align-items-center row">
                <div class="col-10 p-2">
                    <div class="line_2">{!! $description !!}</div>
                </div>

                @if(isset($arrow))
                    <div class="col-2 ps-4 d-flex justify-content-end">
                        <img src="{{ asset('/storage/images/arrow.svg') }}" alt="" />
                    </div>
                @endif

            </div>

            <div class="p-2">
                @if(isset($address))
                    <div class="d-flex align-items-center">
                        <div class="pe-2 block_with_border__pin">
                            <span class="ba_pin_full"></span>
                        </div>

                        <div>
                            {{ $address }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @isset($link)
        </a>
    @endisset
</div>
