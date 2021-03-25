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
                        @foreach ($setup as $data)
                        <?php $no=1; ?>
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $data->jumlah_hari_kerja }}</td>
                                <td>{{ $data->nama_aplikasi }}</td>
                                <td>
                                    <a href="#" class="badge badge-warning btn-edit tampilModalEdit" data-toggle="modal" data-target="#exampleModal" data-id="{{ $data->id }}" >Edit </a>
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
            <div class="modal-body">
                <form action="{{ route('setup.store') }}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" id="id">
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
    @endsection
@endsection

@push('page-scripts')

@endpush

@push('after-scripts')
    <script>
        $(function() {
            $('.tampilModalEdit').on('click', function() {
                const id = $(this).data('id');
                $('#formModalLabel').html('Ubah Setup Aplikasi');
                $('.modal-body form').attr('action', `/konfigurasi/setup/${id}`);
                $('.modal-footer button[type=submit]').html('Ubah Data');

                $.ajax({
                    url: `konfigurasi/setup/${id}/edit`,
                    data: {id : id},
                    method: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        $('#nama_aplikasi').val(data.nama_aplikasi);
                        $('#jumlah_hari_kerja').val(data.jumlah_hari_kerja);
                        $('#id').val(data.id);
                    }
                })
            })
        })
    </script>    
@endpush
