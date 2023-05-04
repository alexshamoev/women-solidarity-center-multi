@extends('master')
@section('pageMetaTitle'){{ $page->metaTitle }}@endsection
@section('pageMetaDescription'){{ $page->metaDescription }}@endsection
@section('pageMetaUrl'){{ $page->metaUrl }}@endsection

@section('content')
    <div class="container about_us main_section_padding">
        <div class="container pb-3">
            @include('includes.tags', [
                'tag0Text' => $homePage->title,
                'tag0Url' => $homePage->fullUrl,
                'tag1Text' => $page->title
            ])
        </div>
            
        <div class="container p-md-0 px-2">
            <div class="p-md-0 px-2">
                <img class="" src="{{ asset('/storage/images/modules/about_us/93/'.$aboutStep0->id.'.jpg') }}" alt="about-us"/>
            </div>        

            <div class="py-2">
                <div class="px-md-0 px-2">
                    <h2 class="py-2  
                                about_us__title 
                                position-relative 
                                d-inline-block">
                        {{ $aboutStep0->title }}
                    </h2>
                </div>

                <div class="py-md-2 
                            p-md-0
                            p-2 
                            pt-md-4
                            pt-4">
                    {!! $aboutStep0->text !!}
                </div>
            </div>

            <div class="stem_wrapper">
                <div class="news__header_wrapper 
                            col-12 
                            text-center 
                            p-0 
                            my-3 
                            pt-2">
                    {{-- @include('includes.pages_headers', [
                                                    'title' => $stemPage->title ,
                                                ]) --}}
                </div>

                <div class="row news_wrapper p-2">
                    {{-- @foreach ($stemStep0 as $item)
                        <div class="col-lg-4 
                                    col-md-6 
                                    col-sm-12 
                                    p-2">
                            @include('includes.block_with_border', [
                                                                    'icon' => asset('/storage/images/arrow.svg'),
                                                                    'photo' => asset('/storage/images/modules/stem/86/'.$item->id.'_stem_img.jpg'),
                                                                    'headline' => 'სიახლეები',
                                                                    'title' => $item->title,
                                                                    'description' => $item->text ,
                                                                    'link' => $item->fullUrl,
                                                                ])
                        </div>
                    @endforeach --}}
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="">
                        {{-- @include('includes.button_with_arrow', [
                                            'title' => 'ნახეთ ყველა',
                                            'link' => $stemPage->fullUrl,
                            ]) --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-md-4 pt-4 p-md-0 p-2 bg-white">
            <div class="p-md-0 p-2">
                @include('modules.join_our_network.step0')
            </div>
        </div>
    </div>
@endsection