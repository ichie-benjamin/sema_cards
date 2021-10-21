@extends('pages.layouts.app')
@section('content')



    <section class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-outer">
            <h4>Hospitals</h4> </div>
    </div>
</section>
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <div class="subscribe-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form method="get" action="about">
                                <input name="search" type="text" placeholder="Search Hospital or Service or place" />

                                <a class="" type="submit">Search</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="tagcloud recent-item">
            <a style="background-color: #561193; color: white" href="#" class="tag-cloud-link">doctor<span class="badge"> 23</span></a>
            <a style="background-color: #561193; color: white"  href="#" class="tag-cloud-link">health <span class="badge">20</span></a>
            <a style="background-color: #561193; color: white" href="#" class="tag-cloud-link">hospital <span class="badge">20</span></a>
        </div>
    </div>

    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="sidebar">

                        <div class="sidebar-box">
                            <div class="sidebar-title">
                                <h3>{{ __('Category') }}</h3> </div>
                            <div class="sidebar-content">
                                <ul>
                                    @foreach(\App\Models\Category::all() as $item)
                                    <li class="{{ $cat == $item->name  ? 'active' : '' }}"><a href="{{ route('hospital_listing') }}?category={{ $item->name }}">{{ lan($item->name, $item->name_ar) }} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-8 col-sm-12">
                    <div class="blog-content">
{{--                        @foreach ($hospitals as $item)--}}
{{--                            <div style="box-shadow: 0 0 15px 0 rgba(86, 17, 147);" class="blog-item">--}}
{{--                                <div class="blog-image">--}}
{{--                                    <img src="{{ $item->image }}" alt="Image" />--}}
{{--                                    <div class="tagcloud">--}}
{{--                                        <a style="background-color: #561193; color: white" href="#" class="tag-cloud-link">{{ $item->category }}</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="news-content pad-top-20">--}}
{{--                                    <div class="news-title">--}}
{{--                                        <h3><a href="{{ route('hospital.show',$item->id) }}">{{ $item->provider_name }}</a></h3>--}}
{{--                                    </div>--}}
{{--                                    <p>{{ $item->short_desc }}.</p>--}}
{{--                                    <hr>--}}
{{--                                    <ul class="mar-top-10">--}}
{{--                                        <li class="mar-bottom-0 mar-right-10"><i class="fa fa-phone" aria-hidden="true"></i>--}}
{{--                                            {{ $item->contact }}  {{ $item->contact2 ? ' - '. $item->contact2 : '' }}</li>--}}
{{--                                    </ul>--}}
{{--                                    <ul class="mar-top-10">--}}
{{--                                        <li class="mar-bottom-0 mar-right-10"><i class="fa fa-map-marker" aria-hidden="true"></i>--}}
{{--                                            {{ $item->address }}</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

                        @foreach ($hospitals as $item)
                            <div style="box-shadow: 0 0 15px 0 rgba(86, 17, 147);" class="row h-items">
                                <div class="col-xs-3">
                                    <img src="{{ $item->image }}" alt="Image" />
                                    <div class="tagcloud">
                                        <a style="background-color: #561193; color: white" href="#" class="tag-cloud-link">{{ lan($item->category, optional($item->cat)->name_ar) }}</a>
                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <div class="news-title">
                                        <h3><a href="{{ route('hospital.view',$item->id) }}">{{ lan($item->provider_name, $item->ar_provider_name) }}</a></h3>
                                    </div>
                                    <p>{{ lan($item->short_desc, $item->short_desc_ar) }}.</p>
                                    <hr>
                                    <ul class="mar-top-10">
                                        <li class="mar-bottom-0 mar-right-10"><i class="fa fa-phone" aria-hidden="true"></i>
                                            {{ $item->contact }}  {{ $item->contact2 ? ' - '. $item->contact2 : '' }}</li>
                                    </ul>
                                    <ul class="mar-top-10">
                                        <li class="mar-bottom-0 mar-right-10"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                            {{ lan($item->address, $item->ar_address) }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                        <div class="pagination__wrapper" style="margin-top: 20px; padding: 20px">
                            {!! $hospitals->links() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection

