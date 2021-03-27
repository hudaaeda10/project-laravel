@extends('layouts.master')
@section('title', 'Laravels')
@section('content')
    <div class="section-body">
        <div class="row">
            <x-alert type="danger" judul="Informasi"/>
            @include('sweetalert::alert')
        </div>
    </div>
@endsection
