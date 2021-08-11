@extends('adminlte::page')
@section('title', 'Tambah Mahasiswa')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Mahasiswa</h1>
@stop
@section('content')
    <form action="{{route('mahasiswa.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="exampleInputName" placeholder="NIM Mahasiswa" name="nim" value="{{old('nim')}}">
                        @error('nim') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Mahasiswa</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputName" placeholder="Nama Mahasiswa" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('mahasiswa.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
