@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Tambah Pelanggan
            </div>
    <form action="{{ route('pelanggan.store') }}" method="POST">
    {{csrf_field()}}
        <div class="card-body">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pelanggan</label><br>
                <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                @if ($errors->has('nama'))
                <span class="text-danger">{{$errors->first('nama')}}</span>
                @endif
            </div>

            <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor Hp</label><br>
            <input type="number" class="form-control" name="no_hp" value="{{old('no_hp')}}">
            @if ($errors->has('no_hp'))
            <span class="text-danger">{{$errors->first('no_hp')}}</span>
            @endif
            </div>

            <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label><br>
            <textarea class="form-control" name="alamat">{{old('alamat')}}</textarea>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="{{route('pelanggan.index')}}" class="btn btn-success btn-sm">Back</a>
            </div>
        </div>
            </form>
        </div>
    </div>
</div>
@endsection
