@extends('template_frontend.section')
@section('content')
<main id="main">
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-items-center text-lg-center " >
                    <div >
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
            <div class="section-title" >
                <h2>Recent Post</h2>
            </div>
            <div class="row" >
                @foreach ($data as $item)
                <div class="col-lg-4 col-md-6 mt-5 mt-md-0" style="padding-bottom: 15px;">
                    <div class="card"  style="max-width: 25rem;  height: 19rem;  border: none; 
                    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 5px 0 rgba(0, 0, 0, 0.10);">
                        <a href="{{ route('app.show', $item->id)}}">
                            <img class="card-img-top" style="height:10rem;" src="{{$item->gambar}}">
                        </a>
                        <div class="card-body">
                            <div class="badge badge-info" style="margin-bottom: 10px">
                                <a href="#" style="color: white; padding-bottom: ">Tutorial</a>
                            </div>
                            <h6><b>
                                    <a href="" style="color: #343a40">
                                        {{$item->title}}
                                    </a>
                                </b>
                            </h6>
                            <p class="card-text"><small class="text-muted">Last updated {{$item->updated_at}}</small>
                            </p>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row" >
                <nav class="d-inline-block" style="margin-top: 30px">
                    {{ $data->links() }}
                </nav>
            </div>

        </div>
    </section>
    <section id="about" class="about">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch">

                </div>

                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                   >
                    <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
                    <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed
                        minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero
                        laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>

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
                    </div>

                </div>
            </div>

        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" >
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>

            <div class="row">
                <div class="col-lg-4" >
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0" >

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section>
</main>
@endsection