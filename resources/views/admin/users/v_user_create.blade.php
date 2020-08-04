@extends('template_backend._section')
@section('sub-title', $sub_title)

@section('content')
<h2 class="section-title">{{$sub_title}}</h2>
<p class="section-lead">{{$lead}}</p>
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        {{Session('success')}}
    </div>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        {{Session('error')}}
    </div>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah User</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
            
                    <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group mb-3">
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <img class="article-image" id="holder" src="{{asset('assets/img/avatar/avatar-1.png')}}"
                                            style="width: 200px;">
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
        

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group mb-3">
                                <input type="text" id="gambar" name="gambar" class="form-control" placeholder=""
                                    aria-label="">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="lfm" data-input="gambar" data-preview="holder"
                                        type="button">Gambar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                                required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                                required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="password" class="form-control" name="password" id="password" required
                                minlength="6">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Type
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="type" id="type" required>
                                <option value="0">Creator</option>
                                <option value="1">Administrator</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')
<script>
    var route_prefix = "/filemanager";
</script>

<script>
    (function( $ ){

        $.fn.filemanager = function(type, options) {
            type = type || 'file';

            this.on('click', function(e) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
            var target_input = $('#' + $(this).data('input'));
            var target_preview = $('#' + $(this).data('preview'));
            window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
            window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                return item.url;
                }).join(',');

                // set the value of the desired input to image url
                target_input.val('').val(file_path).trigger('change');

                // clear previous preview
                target_preview.html('');

                // set or change the preview image src
                items.forEach(function (item) {

                target_preview.attr('src', item.thumb_url);
                // target_preview.attr('background-image', item.thumb_url);
          
                // target_preview.prepend(`
                // <div class="article-image" data-background="${item.thumb_url}" 
                // style="width: 100%;
                // background-image: url('${item.thumb_url}');"></div>`);

                });

                // trigger change event
                target_preview.trigger('change');
            };
            return false;
            });
        }

        })(jQuery);

</script>
<script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
// $('#lfm').filemanager('file', {prefix: route_prefix});
</script>
    
@endsection