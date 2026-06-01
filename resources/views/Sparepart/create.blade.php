@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Tambah Data Sparepart
            </div>
            <div class="card-body">
                <form action="{{ route('sparepart.store') }}" method="POST">
                {{csrf_field()}}

                    {{-- Nama Sparepart --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Sparepart</label>
                        <input type="text" name="nama" class="form-control" required>
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{$errors->first('nama')}}</span>
                        @endif
                    </div>

                    {{-- Stok --}}
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" min="0" value="0" required>
                    </div>

                    {{-- Harga --}}
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{route('sparepart.index')}}" class="btn btn-success btn-sm">Kembali</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection