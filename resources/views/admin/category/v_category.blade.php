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
    <div class="card-body">
        <form class="needs-validation" method="post" id="form-data" novalidate>
            <div class="row text-right">
                <div class="col-md-5">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" aria-label=""
                                required>
                            <input type="hidden" class="form-control" id="id_category" name="id_category" placeholder=""
                                aria-label="" required>
                            <input type="hidden" class="form-control" id="_token" name="_token" value="{{csrf_token()}}">

                            <div class="input-group-append">
                                <button class="btn btn-primary" id="btnNew" type="button"
                                    onclick="tambah('#form-data')">New</button>
                                <button onclick="update('#form-data')" class="btn btn-success" id="btnUpdate"
                                    type="button" style="display: none">Update</button>
                                <button onclick="resetForm()" class="btn btn-danger" id="btnReset" type="button"
                                    style="display: none">Reset</button>
                            </div>
                            <div class="invalid-feedback">
                                Field tidak boleh kosong
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </form>
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr role="row">
                        <th class="text-center sorting_asc" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="#: activate to sort column descending"
                            style="width: 36.4px;">
                            #
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                            aria-label="Task Name: activate to sort column ascending" style="width: 182px;">
                            Name
                        </th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress"
                            style="width: 96.8px;">
                            Slug
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1"
                            aria-label="Action: activate to sort column ascending" style="width: 93.2px;">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item => $hasil)
                    <tr role="row" class="even">
                        <td>{{$item+1}}</td>
                        <td>{{$hasil->name}}</td>
                        <td>{{$hasil->slug}}</td>
                        <td>
                            <form action="{{ route('category.destroy', $hasil->id) }}" method="POST">
                                <a onclick="edit({{$hasil->id}})" style="color:white" class="btn btn-warning"
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

</div>

@endsection

@section('script')
<script>
    'use strict';
    var forms = document.getElementsByClassName('needs-validation');
    $(function() {
        showActionAdd()
    });

    function showActionAdd(){
        $('#btnNew').show();
        $('#btnUpdate').hide();
        $('#btnReset').hide();
    }

    function showActionUpdate(){
        $('#btnNew').hide();
        $('#btnUpdate').show();
        $('#btnReset').show();
    }

    function tambah(obj){
        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            } else {
                var data = $(obj).serialize();
                $.ajax({
                    url: APP_URL + '/category/save',
                    method: "POST",
                    data: data,
                    async: true,
                    dataType: 'json',
                    success: function(res) {
                        var res = JSON.parse(JSON.stringify(res));
                        console.log(res);
                        if (res.success) {
                            showAlert(res.msg, "success", "Info", 3000);
                            $(forms).trigger("reset");
                            reloadPage()
                        } else {
                            showAlert(data.msg, "warning", "Info", 0);
                        }
                    },
                    error: function(err) {
                        swal("Error", "Can't connect to server", "warning");
                    }
                });

            }
        });
    }

    function edit(id) {
        $.ajax({
            url: APP_URL + `/category/${id}/edit`,
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(res) {
                var res = JSON.parse(JSON.stringify(res));
                // console.log(res);
                if (res.success) {
                    showActionUpdate();
                    $('#name').val(res.data.name);
                    $('#id_category').val(res.data.id);
                } else {
                    showAlert(res.msg, "warning", "Info", 0);
                }
            },
            error: function(err) {
                swal("Error", "Tidak bisa terhubung ke server", "warning");
            }
        });

    }
    
    function update(obj) {
        var id = $('#id_category').val();
        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            } else {
                var data = $(obj).serialize();
                console.log(id);
                $.ajax({
                    url: APP_URL + `/category/${id}`,
                    method: "PUT",
                    data: data,
                    async: true,
                    dataType: 'json',
                    success: function(res) {
                        var res = JSON.parse(JSON.stringify(res));
                        if (res.success) {
                            showAlert(res.msg, "success", "Info", 3000);
                            $(forms).trigger("reset");
                            reloadPage()
                        } else {
                            showAlert(data.msg, "warning", "Info", 0);
                        }
                    },
                    error: function(err) {
                        swal("Error", "Tidak bisa terhubung ke server", "warning");
                    }
                });

            }
        });



    }

    function reloadPage(){
        setTimeout(location.reload.bind(location), 2000);
    }

    function resetForm() {
        showActionAdd();
        $(forms).trigger("reset");
    }
</script>

@endsection

{{-- 
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" id="form-data" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan"
                                    required>
                                <div class="invalid-feedback">
                                    Field tidak boleh kosong
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-success" id="btnSave" onclick="simpanData('#form-data');" style="color:white; "><i
                        class="fas fa-save" style="color:white"></i> Tambah</a>
            </div>
        </div>
    </div>
</div> --}}