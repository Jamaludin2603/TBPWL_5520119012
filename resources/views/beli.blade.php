@extends('adminlte::page')

@section('title', 'Beli Barang')

@section('content_header')
    <h1 class="m-0 text-dark text-center">BELI BARANG</h1>
@stop

@section('content')
    @foreach ($datas as $data)
    
        <form method="POST" action="{{$data->id}}" enctype="multipart/form-data">
            
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="old_photo" value="{{$data->photo}}">
                <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" required="required" value="{{$data->name}}" class="form-control" id="inputnama" name="name" readonly>
                </div>
                <div class="form-group">
                    <label for="inputJumlah">Jumlah</label>
                    <input type="text" required="required" value="{{$data->qty}}" class="form-control" id="inputqty" name="qty">
                </div>
                <div class="form-group">
                    <label for="inputHarga">Harga</label>
                    <input type="text" required="required" value="{{$data->price}}" class="form-control" id="inputprice" name="price" readonly>
                </div>
                <br>

                <a class="btn btn-primary" href="{{route ('dashboard')}}"><i
                    ></i>Kembali</a>
                <button type="submit" class="btn btn-primary mr-auto">Beli</button>
        </form>
    @endforeach
@stop
@section('js')
@stop
