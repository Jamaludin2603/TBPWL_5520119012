@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark text-center">Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <hr />
                    {{-- Table --}}
                    <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Merek</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        @if ($product->photo !== null)
                                            <img class="img-thumbnail"
                                                src="{{ asset('storage/photo_barang/' . $product->photo) }}"
                                                alt="{{ "photo_barang_".$product->name }}" width="100px">
                                        @else
                                            [Foto]
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->categories->name }}</td>
                                    <td>{{ $product->brands->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->qty }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a  class="btn" href="/dashboard/beli/{{$product->id}}">
                                            <i class="fas fa-shopping-cart"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- end Table --}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
@stop
