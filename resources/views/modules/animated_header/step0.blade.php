@if($widgetGetVisibility['animated_header'])

    @if($animatedHeader)
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                @foreach($animatedHeader as $data)
                
                    <div class="position-absolute w-100 d-md-block d-none">
                        <h3 class="position-absolute
                                    start-50 
                                    translate-middle-x 
                                    animated_header__activities
                                    pt-3">
                            {{ __('bsw.activities') }}
                        </h3>

                        <div class="animated_header__line_left">
                            <div class="position-absolute line_l"></div>
                        </div>
                        
                        <div class="animated_header__line_right">
                            <div class="position-absolute line_r"></div>
                        </div>
                    </div>
                
                    <div class="carousel-item">
                        <h3 class="position-absolute 
                                    d-md-block 
                                    d-none 
                                    start-50 
                                    top-50 
                                    translate-middle 
                                    animated_header__title 
                                    text-center">

                            @empty($data->link)
                                {{ $data->title }}
                            @else
                                <a href="{{ $data->link }}">
                                    {{ $data->title }}
                                </a>
                            @endempty
                            
                        </h3>
                        
                        <div class="animated_header__img">
                            <img src="{{ asset('/storage/images/modules/animated_header/78/'.$data->id.'.jpg') }}">
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" 
                    type="button" 
                    data-bs-target="#carouselExampleIndicators" 
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next"
                    type="button" 
                    data-bs-target="#carouselExampleIndicators" 
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif
@endif


