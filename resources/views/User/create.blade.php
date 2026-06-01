@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Add User
            </div>
    <form action="{{route('user.store')}}" method="POST">
    {{csrf_field()}}

    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Username</label><br>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
            @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label><br>
            <input type="email" class="form-control" name="email" value="{{old('email')}}">
            @if ($errors->has('email'))
            <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label><br>
            <input type="password" class="form-control" name="password" value="{{old('password')}}">
            @if ($errors->has('password'))
            <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label><br>
            <input type="radio" id="admin" name="role" value="admin" checked>
            <label for="admin">Admin</label><br>
            <input type="radio" id="mekanik" name="role" value="mekanik">
            <label for="mekanik">Mekanik</label>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="{{route('user.index')}}" class="btn btn-success btn-sm">Kembali</a>
        </div>
    </div>
            </form>
        </div>
    </div>
</div>
@endsection
