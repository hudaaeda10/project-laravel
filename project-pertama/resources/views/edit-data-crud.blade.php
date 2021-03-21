@extends('layouts.master')
@section('title', 'Laravels')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>Input Text</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('crud.update', $data_barang->id) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label @error('kode_barang') class="text-danger" @enderror>Kode Barang
                                            @error('kode_barang')
                                                | {{ $message }}
                                            @enderror</label>
                                        <input type="text" class="form-control" name="kode_barang" 
                                            @if (old('kode_barang')) 
                                                value="{{ old('kode_barang') }}"
                                            @else
                                                value="{{ $data_barang->kode_barang }}" 
                                            @endif>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('nama_barang') class="text-danger" @enderror>Nama Barang
                                        @error('nama_barang')
                                            | {{ $message }}
                                        @enderror</label>
                                    <input type="text" class="form-control" name="nama_barang" 
                                    @if (old('nama_barang')) 
                                        value="{{ old('nama_barang') }}"
                                    @else
                                        value="{{ $data_barang->nama_barang }}" 
                                    @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
