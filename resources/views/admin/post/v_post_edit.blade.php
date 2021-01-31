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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Your Post</h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="form-row">
                        <p style="color: slategrey">* Tidak boleh kosong</p>
                    </div>
                    <form action="{{ route('post.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">

                            <div class="form-group col-lg-4 md-12">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">Thumbnail *</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="gambar" name="gambar" value="{{$posts->gambar}}"
                                            class="form-control" placeholder="" aria-label="">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="lfm" data-input="gambar"
                                                data-preview="holder" type="button">Button</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <article class="article article-style-b">
                                            <div class="article-header">
                                                <img class="article-image" id="holder" src="{{$posts->gambar}}"
                                                    style="width: 100%;">
                                            </div>

                                        </article>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-8 md-12">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">Title *</label>
                                    <input type="text" class="form-control" value="{{$posts->title}}" name="title"
                                        id="title" required>

                                </div>
                                <div class="form-row col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Category *</label>
                                        <select class="form-control selectric" name="category_id" id="category_id"
                                            required>
                                            <option value="" holder>--Pilih Category --</option>
                                            @foreach ($category as $item)
                                            <option value="{{$item->id}}" @if ($posts->category_id == $item->id)
                                                selected
                                                @endif
                                                > {{$item->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Slug *</label>
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            value="{{$posts->slug}}" required>
                                    </div>
                                </div>
                                <div class="form-row col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Tags</label>
                                        <select class="form-control select2" multiple="" name="tags[]">
                                            @foreach ($tags as $item)
                                            <option value="{{$item->id}}" @foreach ($posts->tags as $tag)
                                                @if ($item->id == $tag->id)
                                                selected
                                                @endif
                                                @endforeach

                                                >{{$item->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Status</label>
                                        <select class="form-control selectric" name="status" id="status">
                                            <option value="1" @if ($posts->status == 1)
                                                selected
                                                @endif>Publish</option>
                                            <option value="0" @if ($posts->status == 0)
                                                selected
                                                @endif
                                                >Draft</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea name="content" id="content" placeholder="Hello">{!! htmlspecialchars($posts->content) !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection

@section('script')




<script>
    var options = {
    extraPlugins: 'codesnippet',
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };

  CKEDITOR.replace('content', options);
</script>

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