@extends('layouts.master')
@section('title', 'Laravels')
@section('content')
    <div class="section-body">
        <div class="row">
            @include('sweetalert::alert')
            <div class="col-12 col-md-12 col-lg-12">
                @if (sizeof($setup) == 0)
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                <hr>
                @endif
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
                            <th scope="col">Hari Kerja</th>
                            <th scope="col">Nama Aplikasi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($setup as $no => $data)
                            <tr>
                                <th scope="row">{{ $no+1 }}</th>
                                <td>{{ $data->jumlah_hari_kerja }}</td>
                                <td>{{ $data->nama_aplikasi }}</td>
                                <td>
                                    <a href="#" class="badge badge-warning btn-edit" data-id="{{ $data->id }}" >Edit </a>
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
            <h5 class="modal-title" id="formModalLabel">Tambah Setup Aplikasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('setup.store') }}" method="POST">
                    @csrf
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('nama_aplikasi') class="text-danger" @enderror>Nama Aplikasi
                                        @error('nama_aplikasi')
                                            | {{ $message }}
                                        @enderror</label>
                                    <input type="text" class="form-control" name="nama_aplikasi" id="nama_aplikasi"
                                        value="{{ old('nama_aplikasi') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('jumlah_hari_kerja') class="text-danger" @enderror>Hari Kerja
                                        @error('jumlah_hari_kerja')
                                            | {{ $message }}
                                        @enderror</label>
                                    <input type="text" class="form-control" name="jumlah_hari_kerja" id="jumlah_hari_kerja"
                                        value="{{ old('jumlah_hari_kerja') }}">
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="formModalLabel">Tambah Setup Aplikasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('setup.store') }}" method="POST" id="form-edit">
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
            // console.log($(this).data('id'));
            let id = $(this).data('id')
            $.ajax({
                url: `/konfigurasi/setup/${id}/edit`,
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
            // console.log($(this).data('id'));
            let id = $('#form-edit').find('#id_data').val();
            let formData = $('#form-edit').serialize();
            console.log(formData);
            // console.log(id);
            $.ajax({
                url: `/konfigurasi/setup/${id}`,
                method: "PATCH",
                data: formData,
                success: function(data) {
                    // console.log(data);
                    // $('#modal-edit').find('.modal-body').html(data);
                    $('#modal-edit').modal('hide');
                    window.location.assign('/konfigurasi/setup');
                },
                error:function(err) {
                    console.log(err.responseJSON);
                    err_log = err.responseJSON.errors;
                    if (err.status == 422) {
                        if (typeof(err_log.nama_aplikasi) !== 'undefined'){
                            $('#modal-edit').find('[name="nama_aplikasi"]').prev().html('<span style="color:red"> Nama Aplikasi | '+ err_log.nama_aplikasi[0] +'</span>');
                        } else {
                            $('#modal-edit').find('[name="nama_aplikasi"]').prev().html('<span> Nama Aplikasi </span>');
                        }
                    }
                    if (typeof(err_log.jumlah_hari_kerja) !== 'undefined') {
                        $('#modal-edit').find('[name="jumlah_hari_kerja"]').prev().html('<span style="color:red"> Jumlah Hari Kerja | '+ err_log.jumlah_hari_kerja[0] +'</span>');
                    }else {
                        $('#modal-edit').find('[name="jumlah_hari_kerja"]').prev().html('<span> Jumlah Hari Kerja </span>');
                    }
                }
            });
        });
    </script>
@endpush
