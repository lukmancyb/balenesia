@extends('template_frontend.section')
@section('content')
<style>
    /* Note: Try to remove the following lines to see the effect of CSS positioning */
    .affix {
        top: 20px;
        z-index: 9999 !important;
    }
</style>
<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Inner Page</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8" style="margin-bottom: 25px">
                    <div class="card">
                        <div class="card-body">
                            <h2>{{$data->title}}</h2>
                            <div class="badge badge-info" style="margin-bottom: 10px">
                                <a href="#" style="color: white; padding-bottom: ">{{$data->category->name}}</a>
                            </div><br><br>
                            <img src="{{asset($data->gambar)}}" alt="" class="img-fluid">
                            <p>
                                {!! $data->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div id="disqus_thread"></div>
                            <script>
                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                /*
                                var disqus_config = function () {
                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
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

                <div class="col-md-4 col-sm-12" >
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