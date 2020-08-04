@extends('template_backend._section')
@section('sub-title', $sub_title)
@section('app_title', $app_title)

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

<div class="card">
    <div class="card-header text-right">
        {{-- <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Primary</a> --}}
        <a href="{{route('post.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add
            New</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                        <th>Updated At</th>
                        <th>Creator</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item => &$hasil)
                    <tr>
                        <td>{{$item + $data->firstitem()}}</td>
                        <td>{{ucwords(trans($hasil->title))}}</td>
                        <td>{{$hasil->category->name}}</td>
                        <td><img src="{{asset($hasil->gambar)}}" alt="img" class="img-fluid" style="width: 50px"></td>
                    <td>{{date('d M Y', strtotime($hasil->updated_at))}}</td>
                        <td>{{$hasil->users->name}}</td>
                        <td>
                            <form action="{{ route('post.destroy', $hasil->id) }}" method="POST">
                                <a href="{{route('post.edit', $hasil->id)}}" style="color:white" class="btn btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i
                                        class="far fa-edit"></i></a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                    title="" data-original-title="Hapus">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer text-right">
        <nav class="d-inline-block">
            {{ $data->links() }}
        </nav>
    </div>

</div>

@endsection