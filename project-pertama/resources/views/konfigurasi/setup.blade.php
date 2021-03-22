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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($setup as $data)
                        <?php $no=1; ?>
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $data->jumlah_hari_kerja }}</td>
                                <td>
                                    <a href="#" class="badge badge-warning">Edit </a>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Setup Aplikasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('setup.store') }}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                                @csrf
                                <div class="form-group">
                                    <label @error('nama_aplikasi') class="text-danger" @enderror>Nama Aplikasi
                                        @error('nama_aplikasi')
                                            | {{ $message }}
                                        @enderror</label>
                                    <input type="text" class="form-control" name="nama_aplikasi"
                                        value="{{ old('nama_aplikasi') }}">
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label @error('jumlah_hari_kerja') class="text-danger" @enderror>Hari Kerja
                                    @error('jumlah_hari_kerja')
                                        | {{ $message }}
                                    @enderror</label>
                                <input type="text" class="form-control" name="jumlah_hari_kerja"
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

@section('page-scripts')

@endsection

@section('after-scripts')

@endsection
