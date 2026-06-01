@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Sparepart</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('sparepart.update', $dataeditsparepart->sparepart_id) }}"  method="POST">
                {{ csrf_field() }}
                @method('PUT')

                    {{-- Nama Sparepart --}}
                    <div class="mb-3">
                        <label>Nama Sparepart</label>
                        <input type="text" name="nama" class="form-control" value="{{ $dataeditsparepart->nama }}" required>
                    </div>

                    {{-- Stok --}}
                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ $dataeditsparepart->stok }}" min="0" required>
                    </div>

                    {{-- Harga --}}
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ $dataeditsparepart->harga }}" step="0.01" min="0" required>
                    </div>

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    <a href="{{ route('sparepart.index') }}" class="btn btn-success btn-sm">Kembali</a>
                </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection