@extends('template_backend._section')
@section('sub-title', 'File Manager')

@section('content')

<iframe src="{{ url('laravel-filemanager?type=image') }}"
    style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>

@endsection