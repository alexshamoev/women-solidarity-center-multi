@if($widgetGetVisibility['join_our_network'])
    <div class="row border p-md-3 p-2">
        <div class="col-md-8 p-0">
            <div>
                <h3 class="p-2">{{ $joinOurNewtork->title }}</h3>

                <div class="p-2">
                    <div class="line_4">
                    {!! $joinOurNewtork->text !!}
                    </div> 
                </div>

                <div class="p-2">
                    {{-- <a href="{{ $applicationPage->fullUrl }}" target="_blank"> --}}
                        <button class="p-2 px-4 border-0 join_us__button">
                            <h5 class="fw-bold p-2">
                                {{ __('bsw.fill_form') }}
                            </h5>
                        </button>
                    {{-- </a> --}}
                </div>
            </div>
        </div>

        <div class="col-md-4 p-2">
            <div class="position-relative">
            <img src="{{ asset('/storage/images/modules/join_our_network/91/'.$joinOurNewtork->id.'.jpg') }}" alt="{{ $joinOurNewtork->title }}">
                <div class="join_us__human p-3 position-absolute bg-white">
                    <img src="/storage/images/join_us.svg" alt="join_us">
                </div>
            </div>
        </div>
    </div>
@endif