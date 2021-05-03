@extends('adminlte::page')

@section('title', 'Penambahan Barang')

@section('content_header')
    <h1 class="m-0 text-dark text-center">TAMBAH BARANG</h1>
@stop

@section('content')
<form method="POST" action="{{ route('insert.barang') }}" enctype="multipart/form-data">
    @method('POST')
    @csrf
        <div class="form-group">
            <label for="inputNama">Nama</label>
            <input type="text" class="form-control" id="inputname" name="name">
        </div>
        <div class="form-group">
            <label for="inputJumlah">Jumlah</label>
            <input type="text" class="form-control" id="inputqty" name="qty">
        </div>
        <div class="form-group">
            <label for="inputHarga">Harga</label>
            <input type="text" class="form-control" id="inputprice" name="price">
        </div>
        <div class="form-group">
            <label for="inputCategory">Kategori</label>
            <select name="category" id="inputCategory">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="inputBrand">Brand</label>
            <select name="brand" id="inputBrand">
                @foreach ($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
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

@stop
@section('js')
    {{-- <script>
        $(function() {
            $(document).on('click', '#btn-edit-buku', function() {
                let id = $(this).data('id');
                $('#image-area').empty();
                $.ajax({
                    type: "GET",
                    url: `${baseUrl}/admin/api/dataBuku/${id}`,
                    dataType: "JSON",
                    success: function(res) {
                        $('#editId').val(res.id);
                        $('#editJudul').val(res.judul);
                        $('#editPenerbit').val(res.penerbit);
                        $('#editTahun').val(res.tahun);
                        $('#editPenulis').val(res.penulis);
                        $('#editOldCover').val(res.cover);
                        if (res.cover !== null) {
                            $('#image-area').append(
                                `<img class="img-thumbnail" src="${baseUrl}/storage/cover_buku/${res.cover}" width="200px" />`
                            );
                        } else {
                            $('#image-area').append(`[Gambar tidak tersedia]`);
                        }
                    },
                });
            });

            $(document).on('click', '#btn-delete-buku', function() {
                let id = $(this).data('id');
                let cover = $(this).data('cover');

                $('#delete-id').val(id);
                $('#delete-old-cover').val(cover);
            });
        });

    </script> --}}
@stop
