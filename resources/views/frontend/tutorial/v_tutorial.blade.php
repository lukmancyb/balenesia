@extends('template_frontend.section')
@section('app_title', 'Tutorial')
@section('content')

<main id="main">

    <section class="inner-page" style="margin-top: 50px">
        <div class="container">
            <p>
                <h1>
                    <center>Daftar Tutorial</center>
                </h1>
            </p>

        </div>
    </section>
    <section id="tutorial" class="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mt-5 mt-md-0" style="padding-bottom: 15px;">
                    <div class="card" style="border: none; 
                                box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 5px 0 rgba(0, 0, 0, 0.10);">
                        <a href="#">
                            <img class="card-img-top" style="height:13rem; background-color: #F2F2F2; padding: 20px" p
                                src="{{asset('storage/photos/shares/logo/ic_kotlin.svg')}}">
                        </a>
                        <div class="card-body">
                            <div>
                                <center>
                                    <h3>
                                        <a href="#" style="color: black">
                                             Kotlin
                                        </a>
                                    </h3>

                                </center>

                            </div>
                            <div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0" style="padding-bottom: 15px;">
                    <div class="card" style="border: none; 
                                box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 5px 0 rgba(0, 0, 0, 0.10);">
                        <a href="#">
                            <img class="card-img-top" style="height:13rem; background-color: #F2F2F2"
                                src="{{asset('storage/photos/shares/logo/android_logos.svg')}}">
                        </a>
                        <div class="card-body">
                            <h3>
                                <center>
                                    <a href="#" style="color: black">
                                        Android
                                    </a>
                                </center>
                            </h3>

                        </div>
                    </div>

                </div>
            
            </div>
    </section>

</main><!-- End #main -->


@endsection