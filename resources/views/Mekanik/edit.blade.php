@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Edit Mekanik
            </div>
            <form action="{{ route('mekanik.update', $dataeditmekanik->mekanik_id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="card-body">

                    {{-- Nama Mekanik --}}
                    <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mekanik</label>
                    <input type="text" class="form-control" name="nama" value="{{ $dataeditmekanik->nama }}">
                    @if ($errors->has('nama'))
                        <span class="text-danger">
                            {{ $errors->first('nama') }}
                        </span>
                    @endif
                    </div>


                    {{-- Nomor HP --}}
                    <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Hp</label>
                    <input type="number" class="form-control" name="no_hp" value="{{ $dataeditmekanik->no_hp }}">
                    @if ($errors->has('no_hp'))
                        <span class="text-danger">
                            {{ $errors->first('no_hp') }}
                        </span>
                    @endif
                    </div>


                    {{-- Alamat --}}
                    <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat">{{ $dataeditmekanik->alamat }}</textarea>
                    @if ($errors->has('alamat'))
                        <span class="text-danger">
                            {{ $errors->first('alamat') }}
                        </span>
                    @endif
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    <a href="{{ route('mekanik.index') }}" class="btn btn-success btn-sm">Back</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection