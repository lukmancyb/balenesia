@include('template_backend._header')
@include('template_backend._navbar')
@include('template_backend._sidebar')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('sub-title')</h1>
        </div>
        <div class="section-body">
            @yield('content')
        </div>
    </section>
</div>
@include('template_backend._footer')