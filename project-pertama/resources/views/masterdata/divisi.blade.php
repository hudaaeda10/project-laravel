@extends('layouts.master')
@section('title', 'Laravels')
@section('content')
    <div class="section-body">
        <div class="row">
            @include('sweetalert::alert')
            <div class="col-12 col-md-12 col-lg-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                <hr>
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('message') }}
                        </div>
                    </div>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Divisi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $dt)
                            <tr>
                                <th scope="row">{{ $no+1 }}</th>
                                <td>{{ $dt->nama }}</td>
                                <td>
                                    <a href="#" class="badge badge-warning btn-edit" data-id="{{ $dt->id }}" >Edit </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $data_barang->links() }} --}}
            </div>
        </div>
    </div>
    @section('modal')
    {{-- modal tambah --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="formModalLabel">Tambah Divisi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('divisi.store') }}" method="POST">
                    @csrf
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label @error('nama') class="text-danger" @enderror>Divisi
                                        @error('nama')
                                            | {{ $message }}
                                        @enderror</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ old('nama') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
        </div>
    </div>

    {{-- modal edit --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="formModalLabel">Edit Divisi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('divisi.store') }}" method="POST" id="form-edit">
                    @csrf
                <div class="modal-body">
                        
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-update">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    @endsection
@endsection

@push('page-scripts')

@endpush

@push('after-scripts')
    <script>

        @if($errors->any())
            $('#exampleModal').modal('show');
        @endif
        $('.btn-edit').on('click',function(){
            let id = $(this).data('id')
            $.ajax({
                url: `/master-data/divisi/${id}/edit`,
                method: "GET",
                success: function(data) {
                    // console.log(data);
                    $('#modal-edit').find('.modal-body').html(data);
                    $('#modal-edit').modal('show');
                },
                error:function(error) {
                    console.log(error);
                }
            });
        });

        $('.btn-update').on('click',function(){
            let id = $('#form-edit').find('#id_data').val();
            let formData = $('#form-edit').serialize();
            console.log(formData);
            $.ajax({
                url: `/master-data/divisi/${id}`,
                method: "PATCH",
                data: formData,
                success: function(data) {
                    $('#modal-edit').modal('hide');
                    window.location.assign('/master-data/divisi');
                },
                error:function(err) {
                    console.log(err.responseJSON);
                    err_log = err.responseJSON.errors;
                    if (err.status == 422) {
                        if (typeof(err_log.nama) !== 'undefined'){
                            $('#modal-edit').find('[name="nama"]').prev().html('<span style="color:red"> Nama Divisi | '+ err_log.nama[0] +'</span>');
                        } else {
                            $('#modal-edit').find('[name="nama"]').prev().html('<span> Nama Divisi </span>');
                        }
                    }
                }
            });
        });
    </script>
@endpush
