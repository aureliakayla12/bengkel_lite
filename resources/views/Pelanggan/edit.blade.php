@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Edit Data Pelanggan
            </div>
            <form action="{{ route('pelanggan.update', $dataeditpelanggan->pelanggan_id) }}"  method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="card-body">

                    {{-- Nama --}}
                    <div class="mb-3">
                    <label>Nama</label><br>
                    <input type="text" name="nama" class="form-control" value="{{ $dataeditpelanggan->nama }}">
                    @if ($errors->has('nama'))
                        <span class="text-danger">
                            {{ $errors->first('nama') }}
                        </span>
                    @endif
                    </div>


                    {{-- No HP --}}
                    <div class="mb-3">
                    <label>No HP</label><br>
                    <input type="text" name="no_hp" class="form-control" value="{{ $dataeditpelanggan->no_hp }}">
                    @if ($errors->has('no_hp'))
                        <span class="text-danger">
                            {{ $errors->first('no_hp') }}
                        </span>
                    @endif
                    </div>


                    {{-- Alamat --}}
                    <div class="mb-3">
                    <label>Alamat</label><br>
                    <textarea name="alamat" class="form-control" rows="4">{{ $dataeditpelanggan->alamat }}</textarea>
                    @if ($errors->has('alamat'))
                        <span class="text-danger">
                            {{ $errors->first('alamat') }}
                        </span>
                    @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-success btn-sm">Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection