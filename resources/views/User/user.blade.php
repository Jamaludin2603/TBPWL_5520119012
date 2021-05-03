@extends('adminlte::page')

@section('title', 'Pengelolaan User')

@section('content_header')
    <h1 class="m-0 text-dark text-center">Pengelolaan User</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route ('user.tambah')}}"><i></i>Tambah User</a>
                    <hr />
                    {{-- Table --}}
                    <table id="table-data" class="table table-bordered" style="word-break:break-all">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>
                                        @if ($user->photo !== null)
                                            <img class="img-thumbnail"
                                                src="{{ asset('storage/photo_user/' . $user->photo) }}"
                                                alt="{{ "photo_user_".$user->name }}" width="100px">
                                        @else
                                            [Foto]
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>{{ $user->roles->name }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a  class="btn" href="/Admin/Users/edit/{{$user->id}}">
                                            <i class="fas fa-pencil-alt"></i> </a>

                                            <button type="button" id="btn-delete-user" class="btn btn-danger"
                                                data-toggle="modal" data-target="#deleteUserModal"
                                                data-id="{{ $user->id }}"
                                                data-photo ="{{$user->photo}}"><i class="fas fa-trash-alt"></i></button>

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
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="hapusUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('user.hapus') }}" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusUserLabel">{{ _('Hapus Data User') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin menghapus user tersebut ?
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
            $(document).on('click', '#btn-delete-user', function() {
                let id = $(this).data('id');
                let photo = $(this).data('photo');

                $('#delete-id').val(id);
                $('#delete-photo').val(photo);

            });
        });

    </script>
@stop
