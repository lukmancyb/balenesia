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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Write Your Post</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('post.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="title" id="title" value="{{$posts->title}}"
                                required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Category
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="category_id" id="category_id" required>
                                <option value="" holder>--Pilih Category --</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}" @if ($item->id == $posts->category_id)
                                    selected
                                    @endif
                                    > {{$item->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote-simple" name="content" id="content"
                                required>{{$posts->content}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-12">
                        <label class="col-form-label text-md-right col-8 col-md-3 col-lg-3">Thumbnail</label>
                        <div class="col-sm-12 col-md-6">
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="gambar" id="image-upload" />
                            </div>
                        </div>
                       

                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control select2" multiple="" name="tags[]">
                                @foreach ($tags as $item)
                                <option value="{{$item->id}}" @foreach ($posts->tags as $value)
                                    @if ($item->id == $value->id)
                                    selected
                                    @endif

                                    @endforeach

                                    >{{$item->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="slug" id="slug" value="{{$posts->slug}}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="status" id="status">
                                <option value="publish" >Publish</option>
                                <option value="draft">Draft</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection