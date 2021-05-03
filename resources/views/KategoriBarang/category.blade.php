@extends('adminlte::page')

@section('title', 'Pengelolaan Kategori')

@section('content_header')
    <h1 class="m-0 text-dark text-center">Pengelolaan Kategori</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route ('admin.kategori.tambah')}}"><i></i>Tambah Barang</a>
                    <hr />
                    {{-- Table --}}
                    <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a  class="btn" href="/Admin/Kelola_Kategori/edit/{{$category->id}}">
                                                <i class="fas fa-pencil-alt"></i> </a>

                                            <button type="button" id="btn-delete-Category" class="btn btn-danger"
                                                data-toggle="modal" data-target="#deleteCategoryModal"
                                                data-id="{{ $category->id }}"><i class="fas fa-trash-alt"></i></button>

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
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="hapusCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('kategori.hapus') }}" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusCategoryLabel">{{ _('Hapus Data Category') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin menghapus Category tersebut ?
                        <div class="modal-footer">
                            <input type="hidden" id="delete-id" name="id">
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
            $(document).on('click', '#btn-delete-Category', function() {
                let id = $(this).data('id');

                $('#delete-id').val(id);
            });
        });

    </script>
@stop
