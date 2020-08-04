@extends('template_frontend.section')
@section('app_title', ucwords($data->title))

@section('content')
<main id="main">
    <section class="inner-page">
        <div class="container" style="margin-top: 80px">
            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="padding: 20px">
                        <div class="card-body">
                            <h1>{{ucwords($data->title)}}</h1>

                            @foreach ($data->tags as $item)

                            <div class="badge badge-info" style="margin-bottom: 10px">
                                <a href="#" style="color: white; padding-bottom: ">{{$item->name}}</a>
                            </div>
                            @endforeach

                            <img src="{{asset($data->gambar)}}" alt="" class="img-fluid" style="margin-top: 20px">
                            <p style="margin-top: 30px">
                                {!! $data->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="card" style="margin-top: 40px">
                        <div class="card-body">
                            <div id="disqus_thread"></div>
                            <script>
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://balenesia.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a
                                    href="https://disqus.com/?ref_noscript">comments
                                    powered by Disqus.</a>
                            </noscript>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <img src="{{asset($data->gambar)}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <img src="{{asset($data->gambar)}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <img src="{{asset($data->gambar)}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>
</main>

@endsection