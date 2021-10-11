@extends('pages.layouts.app')
@section('content')



    <section class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-outer">
            <h2>Hospitals</h2> </div>
    </div>
</section>
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <div class="subscribe-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form>
                                <input type="email" placeholder="Search Hospital or Service or place"> <a href="#">Search</a> </form>
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
                                <h3>Regions</h3> </div>
                            <div class="sidebar-content">
                                <ul>
                                    <li class="active"><a href="#">Cardiology</a></li>
                                    <li><a href="#">Neurologist</a></li>
                                    <li><a href="#">Consultant</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-8 col-sm-12">
                    <div class="blog-content">
                        <div style="box-shadow: 0 0 15px 0 rgba(86, 17, 147);" class="blog-item">
                            <div class="blog-image"> <img src="{{ asset('frontpage/images/blog/b1.jpg') }}" alt="Image"> </div>
                            <div class="news-content pad-top-20">
                                <div class="news-title">
                                    <h3><a href="#">Specialized Medical Center Hospital - Riyadh</a></h3> </div>
                                <div class="tagcloud mar-bottom-10">
                                    <a style="background-color: #561193; color: white" href="#" class="tag-cloud-link">doctor</a>
                                    <a style="background-color: #561193; color: white" href="#" class="tag-cloud-link">health</a>
                                </div>

                                <p>There’s a good chance Everyday Health .</p>
                                <hr>
                                <ul class="mar-top-10">
                                    <li class="mar-bottom-0 mar-right-10"><i class="fa fa-phone" aria-hidden="true"></i>  0114644434 - 920002063</li>
                                </ul>
                                <ul class="mar-top-10">
                                    <li class="mar-bottom-0 mar-right-10"><i class="fa fa-map-marker" aria-hidden="true"></i> Riyadh</li>
                                </ul>
                            </div>
                        </div>

                        <div class="pagination__wrapper">
                            <ul class="pagination">
                                <li>
                                    <button class="prev" title="previous page">❮</button>
                                </li>
                                <li>
                                    <button title="first page - page 1">1</button>
                                </li>
                                <li>
                                    <button>2</button>
                                </li>
                                <li>
                                    <button class="active" title="current page">2</button>
                                </li>
                                <li>
                                    <button>3</button>
                                </li>
                                <li>
                                    <button>4</button>
                                </li>
                                <li>
                                    <button class="next" title="next page">❯</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection

