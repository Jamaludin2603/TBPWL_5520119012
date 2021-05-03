@extends('adminlte::page')

@section('title', 'Edit Merek')

@section('content_header')
    <h1 class="m-0 text-dark text-center">EDIT MEREK</h1>
@stop

@section('content')
    @foreach ($datas as $data)
    
        <form method="POST" action="{{$data->id}}" enctype="multipart/form-data">
            
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$data->id}}">
                <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" required="required" value="{{$data->name}}" class="form-control" id="inputnama" name="name">
                </div>
                <div class="form-group">
                    <label for="inputDeskripsi">Deskripsi</label>
                    <input type="text" required="required" value="{{$data->description}}" class="form-control" id="inputdescription" name="description">
                </div>

                <a class="btn btn-primary" href="{{route ('admin.merk')}}"><i
                    ></i>Kembali</a>
                <button type="submit" class="btn btn-primary mr-auto">Kirim</button>
        </form>
    @endforeach
@stop
@section('js')
@stop
