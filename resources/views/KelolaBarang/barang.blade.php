@extends('adminlte::page')

@section('title', 'Pengelolaan Barang')

@section('content_header')
    <h1 class="m-0 text-dark text-center">Pengelolaan Barang</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route ('admin.barang.tambah')}}"><i></i>Tambah Barang</a>
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
                                            <a  class="btn" href="/Admin/Kelola_Barang/edit/{{$product->id}}">
                                            <i class="fas fa-pencil-alt"></i> </a>

                                            <button type="button" id="btn-delete-barang" class="btn btn-danger"
                                                data-toggle="modal" data-target="#deleteBarangModal"
                                                data-id="{{ $product->id }}"
                                                data-photo ="{{$product->photo}}"><i class="fas fa-trash-alt"></i></button>

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
    {{-- Modal Hapus --}}
    <div class="modal fade" id="deleteBarangModal" tabindex="-1" aria-labelledby="hapusBarangLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('barang.hapus') }}" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusBarangLabel">{{ _('Hapus Data Barang') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin menghapus barang tersebut ?
                        <div class="modal-footer">
                            <input type="hidden" id="delete-id" name="id">
                            <input type="hidden" id="delete-photo" name="photo">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
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
            }); --}}
    <script>
        $(function() {
            $(document).on('click', '#btn-delete-barang', function() {
                let id = $(this).data('id');
                let photo = $(this).data('photo');

                $('#delete-id').val(id);
                $('#delete-photo').val(photo);

            });
        });

    </script>
@stop
