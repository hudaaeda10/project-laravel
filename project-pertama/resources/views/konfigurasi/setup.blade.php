@extends('layouts.master')
@section('title', 'Laravels')
@section('content')
    <div class="section-body">
        <div class="row">
            @include('sweetalert::alert')
            <div class="col-12 col-md-12 col-lg-12">
                Halaman Crud
                <br>
                <a href="{{ route('crud.tambah') }}" class="btn btn-icon icon-left btn-primary">
                    <i class="far fa-edit"></i> Tambah Data</a>
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
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_barang as $no => $data)
                            <tr>
                                <th scope="row">{{ $data_barang->firstItem() + $no }}</th>
                                <td>{{ $data->kode_barang }}</td>
                                <td>{{ $data->nama_barang }}</td>
                                <td>
                                    <a href="{{ route('crud.edit', $data->id) }}" class="badge badge-warning">Edit </a>
                                    <a href="{{ route('crud.delete', $data->id) }}" class="badge badge-danger"
                                        onclick="return confirm('Yakin ingin dihapus?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data_barang->links() }}
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')

@endsection

@section('after-scripts')

@endsection
