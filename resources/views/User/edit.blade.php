@extends('template.layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
<form action="{{ route('user.update', $dataedituser->user_id) }}" method="POST">
    {{ csrf_field()}}
    @method('PUT')
    <div class="card-body">

    <div class="mb-3">
        <label for="username" class="form-label">Username</label><br>
        <input type="text" class="form-control" name="name" value="{{ old('name', $dataedituser->name) }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label><br>
        <input type="email" class="form-control" name="email" value="{{ old('email', $dataedituser->email) }}">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label><br>
        <input type="password" class="form-control" name="password" placeholder="New Password">
    </div>

    <div class="mb-3">
        <label>Role</label><br>
        <input type="radio" id="admin" name="role" value="admin" checked>
        <label for="admin">Admin</label><br>
        <input type="radio" id="mekanik" name="role" value="mekanik">
        <label for="mekanik">Mekanik</label>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="{{route('user.index')}}" class="btn btn-success btn-sm">Back</a>
    </div>
    </div>
            </form>
        </div>
    </div>
</div>
@endsection
