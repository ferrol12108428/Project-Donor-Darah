@extends('layout')

@section('content')
<div class="tm-main-content" id="top">
    <div class="tm-top-bar-bg"></div>
    <div class="tm-top-bar" id="tm-top-bar">
        <!-- Top Navbar -->
        <div class="container">
            <div class="row">

                <nav class="navbar navbar-expand-lg narbar-light">
                    <a class="navbar-brand mr-auto" href="/">
                        <img src="{{ asset('assets/img/blood-58.png')}}" alt="Site logo">
                        Donor Darah
                    </a>
                    <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#top">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tm-section-4">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tm-section-5">Blog Entries</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tm-section-6">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @if (Auth::check())
    @if (Auth::user()->role == 'admin')
    <a href="{{route('data')}}" class="btn btn-primary mb-3 float-end">Lihat Data</a>
    @elseif (Auth::user()->role == 'petugas')
    <a href="{{route('data.petugas')}}" class="btn btn-primary mb-3 float-end">Lihat Data</a>
    @endif
    <!-- kalau dia belum login, button yang dimunculin button buat ke halaman login -->
    @else
    <a href="{{route('login')}}" class="btn btn-primary mb-3 float-end">Log In</a>
    @endif
    <div class="tm-section tm-bg-img" id="tm-section-1" style="clear: right;">
        <div class="tm-bg-white ie-container-width-fix-2">
            <div class="container ie-h-align-center-fix">
                <div class="row">
                    <img src="{{asset('assets/img/')}}" alt="">
                    <!-- <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                        <form action="index.html" method="get" class="tm-search-form tm-section-pad-2">
                            <div class="form-row tm-search-form-row">
                                <div class="form-group tm-form-element tm-form-element-100">
                                    <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                    <input name="city" type="text" class="form-control" id="inputCity" placeholder="Type your destination...">
                                </div>
                                <div class="form-group tm-form-element tm-form-element-50">
                                    <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                    <input name="check-in" type="text" class="form-control" id="inputCheckIn" placeholder="Check In">
                                </div>
                                <div class="form-group tm-form-element tm-form-element-50">
                                    <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                    <input name="check-out" type="text" class="form-control" id="inputCheckOut" placeholder="Check Out">
                                </div>
                            </div>
                            <div class="form-row tm-search-form-row">
                                <div class="form-group tm-form-element tm-form-element-2">
                                    <select name="adult" class="form-control tm-select" id="adult">
                                        <option value="">Adult</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <i class="fa fa-2x fa-user tm-form-element-icon"></i>
                                </div>
                                <div class="form-group tm-form-element tm-form-element-2">
                                    <select name="children" class="form-control tm-select" id="children">
                                        <option value="">Children</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <i class="fa fa-user tm-form-element-icon tm-form-element-icon-small"></i>
                                </div>
                                <div class="form-group tm-form-element tm-form-element-2">
                                    <select name="room" class="form-control tm-select" id="room">
                                        <option value="">Room</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <i class="fa fa-2x fa-bed tm-form-element-icon"></i>
                                </div>
                                <div class="form-group tm-form-element tm-form-element-2">
                                    <button type="submit" class="btn btn-primary tm-btn-search">Check Availability</button>
                                </div>
                            </div>
                            <div class="form-row clearfix pl-2 pr-2 tm-fx-col-xs">
                                <p class="tm-margin-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href="#" class="ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary">Need Help?</a>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="tm-section-2">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="tm-section-title">We are here to help you?</h2>
                    <p class="tm-color-white tm-section-subtitle">Subscribe to get our newsletters</p>
                    <a href="#" class="tm-color-white tm-btn-white-bordered">Subscribe Newletters</a>
                </div>
            </div>
        </div>
    </div>

    <div class="tm-section tm-position-relative">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
            <polygon fill="#ee5057" points="0,0  100,0  50,60"></polygon>
        </svg>
        <div class="container tm-pt-5 tm-pb-4">
            <div class="row text-center">
                <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                    <i class="fa tm-fa-6x fa-legal tm-color-primary tm-margin-b-20"></i>
                    <h3 class="tm-color-primary tm-article-title-1">Level HTML Template by Tooplate website</h3>
                    <p>You are allowed to download, edit and use this template for your business or client websites.</p>
                    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                </article>
                <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                    <i class="fa tm-fa-6x fa-plane tm-color-primary tm-margin-b-20"></i>
                    <h3 class="tm-color-primary tm-article-title-1">Original Website Template Producer</h3>
                    <p>You are NOT allowed to re-distribute the downloadable template ZIP file on any website.</p>
                    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                </article>
                <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                    <i class="fa tm-fa-6x fa-life-saver tm-color-primary tm-margin-b-20"></i>
                    <h3 class="tm-color-primary tm-article-title-1">Contact us if you have any question</h3>
                    <p>If you see this template being distributed on any other site, that is an illegal copy.</p>
                    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                </article>
            </div>
        </div>
    </div>

    <div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="tm-article-carousel">
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="{{asset('assets/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header>
                                    <h3 class="text-uppercase tm-article-title-2">Nunc in felis aliquet metus luctus iaculis</h3>
                                </header>
                                <p>Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla. Nullam sollicitudin at augue venenatis eleifend. Nulla ligula ligula, egestas sit amet viverra id, iaculis sit amet ligula.</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">Get More Info.</a>
                            </div>
                        </article>
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="{{asset('assets/img/img-02.jpg')}}" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header>
                                    <h3 class="text-uppercase tm-article-title-2">Sed cursus dictum nunc quis molestie</h3>
                                </header>
                                <p>Pellentesque quis dui sit amet purus scelerisque eleifend sed ut eros. Morbi viverra blandit massa in varius. Sed nec ex eu ex tincidunt iaculis. Curabitur eget turpis gravida.</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">View Detail</a>
                            </div>
                        </article>
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="{{asset('assets/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header>
                                    <h3 class="text-uppercase tm-article-title-2">Eget diam pellentesque interdum ut porta</h3>
                                </header>
                                <p>Aenean finibus tempor nulla, et maximus nibh dapibus ac. Duis consequat sed sapien venenatis consequat. Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla.</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">More Info.</a>
                            </div>
                        </article>
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="{{asset('assets/img/img-02.jpg')}}" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header>
                                    <h3 class="text-uppercase tm-article-title-2">Lorem ipsum dolor sit amet, consectetur</h3>
                                </header>
                                <p>Suspendisse molestie sed dui eget faucibus. Duis accumsan sagittis tortor in ultrices. Praesent tortor ante, fringilla ac nibh porttitor, fermentum commodo nulla.</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">Detail Info.</a>
                            </div>
                        </article>
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="{{asset('assets/img/img-01.jpg')}}" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header>
                                    <h3 class="text-uppercase tm-article-title-2">Orci varius natoque penatibus et</h3>
                                </header>
                                <p>Pellentesque quis dui sit amet purus scelerisque eleifend sed ut eros. Morbi viverra blandit massa in varius. Sed nec ex eu ex tincidunt iaculis. Curabitur eget turpis gravida.</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">Read More</a>
                            </div>
                        </article>
                        <article class="tm-bg-white tm-carousel-item">
                            <img src="{{asset('assets/img/img-02.jpg')}}" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header>
                                    <h3 class="text-uppercase tm-article-title-2">Nullam sollicitudin at augue venenatis eleifend</h3>
                                </header>
                                <p>Aenean finibus tempor nulla, et maximus nibh dapibus ac. Duis consequat sed sapien venenatis consequat. Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla.</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">More Details</a>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-recommended-container">
                    <div class="tm-bg-white">
                        <div class="tm-bg-primary tm-sidebar-pad">
                            <h3 class="tm-color-white tm-sidebar-title">Recommended Places</h3>
                            <p class="tm-color-white tm-margin-b-0 tm-font-light">Enamel pin cliche tilde, kitsch and VHS thundercats</p>
                        </div>
                        <div class="tm-sidebar-pad-2">
                            <a href="#" class="media tm-media tm-recommended-item">
                                <img src="{{asset('assets/img/tn-img-01.jpg')}}" alt="Image">
                                <div class="media-body tm-media-body tm-bg-gray">
                                    <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Europe</h4>
                                </div>
                            </a>
                            <a href="#" class="media tm-media tm-recommended-item">
                                <img src="{{asset('assets/img/tn-img-02.jpg')}}" alt="Image">
                                <div class="media-body tm-media-body tm-bg-gray">
                                    <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Asia</h4>
                                </div>
                            </a>
                            <a href="#" class="media tm-media tm-recommended-item">
                                <img src="{{asset('assets/img/tn-img-03.jpg')}}" alt="Image">
                                <div class="media-body tm-media-body tm-bg-gray">
                                    <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Africa</h4>
                                </div>
                            </a>
                            <a href="#" class="media tm-media tm-recommended-item">
                                <img src="{{asset('assets/img/tn-img-04.jpg')}}" alt="Image">
                                <div class="media-body tm-media-body tm-bg-gray">
                                    <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">South America</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tm-bg-video">
        <div class="overlay">
            <i class="fa fa-5x fa-play-circle tm-btn-play"></i>
            <i class="fa fa-5x fa-pause-circle tm-btn-pause"></i>
        </div>
        <video controls="" loop="" class="tmVideo">
            <source src="{{asset('assets/videos/video.mp4')}}" type="video/mp4">
            <source src="{{asset('assets/videos/video.ogg')}}" type="video/ogg">
            Your browser does not support the video tag.
        </video>
        <div class="tm-section tm-section-pad tm-bg-img" id="tm-section-5">
            <div class="container ie-h-align-center-fix">
                <div class="row tm-flex-align-center">
                    <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 tm-media-title-container">
                        <h2 class="text-uppercase tm-section-title-2">ASIA</h2>
                        <h3 class="tm-color-primary tm-font-semibold tm-section-subtitle-2">Singapore</h3>
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-9 col-xl-9 mt-0 mt-sm-3">
                        <div class="ml-auto tm-bg-white-shadow tm-pad tm-media-container">
                            <article class="media tm-margin-b-20 tm-media-1">
                                <img src="{{asset('assets/img/img-03.jpg')}}" alt="Image">
                                <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                    <h3 class="tm-font-semibold tm-color-primary tm-article-title-3">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                    <p>Vivamus eget tellus ornare, sollicitudin quam id, dictum nulla. Phasellus finibus rhoncus justo, tempus eleifend neque dictum ac. Aenean metus leo, consectetur non.
                                        <br><br>
                                        Etiam aliquam arcu at mauris consectetur scelerisque. Integer elementum justo in orci facilisis ultricies. Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida.
                                    </p>
                                </div>
                            </article>
                            <article class="media tm-margin-b-20 tm-media-1">
                                <img src="{{asset('assets/img/img-04.jpg')}}" alt="Image">
                                <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                    <h3 class="tm-font-semibold tm-article-title-3">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                    <p>Duis accumsan sagittis tortor in ultrices. Praesent tortor ante, fringilla ac nibh porttitor, fermentum commodo nulla.</p>
                                    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                                </div>
                            </article>
                            <article class="media tm-margin-b-20 tm-media-1">
                                <img src="{{asset('assets/img/img-05.jpg')}}" alt="Image">
                                <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                    <h3 class="tm-font-semibold tm-article-title-3">Faucibus dolor ligula nisl metus auctor aliquet</h3>
                                    <p>Nunc in felis aliquet metus luctus iaculis vel et nisi. Nulla venenatis nisl orci, laoreet ultricies massa tristique id.</p>
                                    <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
        <div class="container ie-h-align-center-fix">
            <div class="row">
                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                    <div id="google-map"></div>
                </div> -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3 mt-md-0">
                    <div class="tm-bg-white tm-p-4">
                        <h2 class="navbar-brand mr-auto">Buat Pengaduan</h2>
                        @if ($errors->any())
                        <ul style="width: 100%; background: red; padding: 10px;">
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form action="{{route('store')}}" method="post" class="contact-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Name :</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <label for="">Email :</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <label for="">No Telp :</label>
                                <input type="number" id="no_telp" name="no_telp" class="form-control" placeholder="No Telp" />
                            </div>
                            <div class="form-group">
                                <label for="">Age :</label>
                                <input type="number" id="age" name="age" class="form-control" placeholder="Age" />
                            </div>
                            <div class="form-group">
                                <label for="">Weight :</label>
                                <input type="number" id="BB" name="BB" class="form-control" placeholder="Berat Badan" />
                            </div>
                            <div class="from-group mb-2">
                                <label for="">Blood Type :</label><br>
                                <select name="goldar" id="goldar" class="from-select" aria-label="Default select example">
                                    <option selected hidden disabled>choose your blood type</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Message :</label>
                                <textarea id="pesan" name="pesan" class="form-control" rows="9" placeholder="Input Your Message"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Gambar Terkait :</label>
                                <input type="file" name="foto">
                            </div>
                            <button type="submit" class="btn btn-primary tm-btn-primary">Send Message Now</button>
                        </form>
                    </div>
                </div>
                <div class="card laporan-card col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3 mt-md-0" style="clear: right;">
                    <h2 class="navbar-brand mr-auto">Laporan Pengaduan</h2>
                    @foreach ($datas as $data)
                    <div class=" article">
                        <p>{{ \Carbon\Carbon::parse($data['created_at'])->format('j F, Y') }} : {{$data['nama']}}</p>
                        <div class="content">
                            <div class="text">
                                {{$data['pesan']}}
                            </div>
                            <div>
                                <img src="{{asset('assets/img/'.$data->foto)}}" width="450">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <footer class="tm-bg-dark-blue">
        <div class="container">
            <div class="row">
                <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
                    Copyright &copy; <span class="tm-current-year">2018</span> Your Company

                    - Design: <a rel="nofollow" href="https://www.tooplate.com" class="tm-color-primary tm-font-normal" target="_parent">Tooplate</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection