@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1 class="m-0 text-dark text-center">EDIT USER</h1>
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
            <label for="inputUsername">Username</label>
            <input type="text" required="required" value="{{$data->username}}" class="form-control" id="inputusername" name="username">
        </div>
        <div class="form-group">
            <label for="inputemail">Email</label>
            <input type="text" required="required" value="{{$data->email}}" class="form-control" id="inputemail" name="email">
        </div>
        <div class="form-group">
            <label for="inputpassword">Password</label>
            <input type="password" required="required" value="{{$data->password}}" class="form-control" id="inputpassword" name="password">
        </div>
        <div class="form-group">
            <label for="inputRole">Role</label>
            <select name="role" id="inputRole">
                @foreach ($datas->roles as $item)
                <option value="{{$item->id}}" {{ $data->roles_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" id="inputphoto" name="photo">
        </div> <br>

        <a class="btn btn-primary" href="{{route ('admin.Users')}}"><i
            ></i>Kembali</a>
        <button type="submit" class="btn btn-primary mr-auto">Kirim</button>
</form>
@endforeach
@stop
@section('js')
@stop
