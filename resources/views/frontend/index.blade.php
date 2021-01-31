@extends('template_frontend.section')
@section('content')
@section('app_title', $app_title)
<main id="main">
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-items-center text-lg-center ">
                    <div>
                        <h2><b>" Tingkatkan skillmu</b>, mulailah dengan hal yang sederhana"</h2>
                        <div class="text-center text-lg-center">
                            <a href="#about" class="btn-get-started scrollto">Mulai</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section>
    <section id="tutorial" class="team">
        <div class="container">
            <div class="section-title">
                <h2>Artikel</h2>
            </div>
            <div class="row">
                @foreach ($data as $item)
                <div class="col-lg-4 col-md-6 mt-5 mt-md-0" style="margin-bottom: 15px;">
                    <div class="card" style="max-width: 25rem;  height: 20rem;  border: none; 
                    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 5px 0 rgba(0, 0, 0, 0.10);">

                        {{-- <div class="card-header"> --}}
                            <a href="{{ route('app.show', $item->slug)}}">
                                <img class="card-img-top" style="20rem" src="{{$item->gambar}}">
                            </a>
                        {{-- </div> --}}

                        <div class="card-body">
                            <div class="badge badge-info" style="margin-bottom: 10px">
                                <a href="#" style="color: white; padding-bottom: ">{{$item->category->name}}</a>
                            </div>
                            <h6><b>
                                    <a href="" style="color: #343a40">
                                        {{ucwords($item->title)}}
                                    </a>
                                </b>
                            </h6>
                            <p class="card-text"><small class="text-muted">Last updated
                                    {{date('d M Y', strtotime($item->updated_at))}}</small>
                            </p>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <nav class="d-inline-block" style="margin-top: 30px">
                    {{ $data->links() }}
                </nav>
            </div>

        </div>
    </section>
    <section id="about" class="about" style="padding-bottom: 100px ; background-color: #f8f9fa">

        <div class="container">

            <div class="row">
                <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch">

                </div>

                <div
                    class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                    <h3>Tentang Kami</h3>
                    <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed
                        minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero
                        laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>
                    {{-- 
                    <div class="icon-box" >
                        <div class="icon"><i class="bx bx-fingerprint"></i></div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                            excepturi sint occaecati cupiditate non provident</p>
                    </div>

                    <div class="icon-box" >
                        <div class="icon"><i class="bx bx-gift"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis praesentium voluptatum deleniti atque</p>
                    </div>

                    <div class="icon-box" >
                        <div class="icon"><i class="bx bx-atom"></i></div>
                        <h4 class="title"><a href="">Dine Pad</a></h4>
                        <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis
                            odit. Sunt aut deserunt minus aut eligendi omnis</p>
                    </div> --}}

                </div>
            </div>

        </div>
    </section>

</main>
@endsection