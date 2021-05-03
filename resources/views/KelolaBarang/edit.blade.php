@extends('adminlte::page')

@section('title', 'Edit Barang')

@section('content_header')
    <h1 class="m-0 text-dark text-center">EDIT BARANG</h1>
@stop

@section('content')
    @foreach ($datas as $data)
    
        <form method="POST" action="{{$data->id}}" enctype="multipart/form-data">
            
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="old_photo" value="{{$data->photo}}">
                <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" required="required" value="{{$data->name}}" class="form-control" id="inputnama" name="name">
                </div>
                <div class="form-group">
                    <label for="inputJumlah">Jumlah</label>
                    <input type="text" required="required" value="{{$data->qty}}" class="form-control" id="inputqty" name="qty">
                </div>
                <div class="form-group">
                    <label for="inputHarga">Harga</label>
                    <input type="text" required="required" value="{{$data->price}}" class="form-control" id="inputprice" name="price">
                </div>
                <div class="form-group">
                    <label for="inputKategori">Kategori</label>
                    <select name="category" id="inputCategory">
                        @foreach ($datas->categories as $item)
                        <option value="{{$item->id}}" {{ $data->categories_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputMerk">Merk</label>
                    <select name="brand" id="inputMerk">
                        @foreach ($datas->brands as $item)
                        <option value="{{$item->id}}" {{ $data->brands_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" id="inputphoto" name="photo">
                </div> <br>

                <a class="btn btn-primary" href="{{route ('admin.barang')}}"><i
                    ></i>Kembali</a>
                <button type="submit" class="btn btn-primary mr-auto">Kirim</button>
        </form>
    @endforeach
@stop
@section('js')
@stop
