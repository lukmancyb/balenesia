
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

<div class="card">
    <div class="card-header text-right">
        {{-- <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Primary</a> --}}
        <a href="{{route('users.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add
            New</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item => $hasil)
                    <tr>
                        <td>{{$item + $data->firstitem()}}</td>
                        <td>{{$hasil->name}}</td>
                        <td>{{$hasil->email}}</td>
                        <td>
                            @switch($hasil->type)
                                @case(0)
                                   <span class="badge badge-info"> Creator</span>
                                    @break
                                @case(1)
                                <span class="badge badge-success"> Admin</span>
                                    @break
                                @default
                                <span class="badge badge-info"> Creator</span>
                            @endswitch
                        </td>
                        <td>{{$hasil->created_at}}</td>
                        <td>
                            <form action="{{ route('users.destroy', $hasil->id) }}" method="POST">
                                <a href="{{route('users.edit', $hasil->id)}}" style="color:white" class="btn btn-warning"
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