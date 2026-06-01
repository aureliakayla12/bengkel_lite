@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Tambah Data Motor
            </div>
            <form action="{{ route('motor.store') }}" method="POST">
            {{csrf_field()}}
            <div class="card-body">
                    {{-- Pelanggan --}}
                    <div class="mb-3">
                    <label for="pelanggan_id" class="form-label">Pelanggan</label>
                    <select name="pelanggan_id" class="form-control">
                        <option value="">
                            -- Pilih Pelanggan --
                        </option>
                        @foreach ($pelanggan as $p)
                            <option value="{{ $p->pelanggan_id }}"
                                {{ old('pelanggan_id') == $p->pelanggan_id ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                        </select>
                        @if ($errors->has('pelanggan_id'))
                            <span class="text-danger">
                                {{ $errors->first('pelanggan_id') }}
                            </span>
                        @endif
                    </div>


                    {{-- Nomor Plat --}}
                    <div class="mb-3">
                    <label for="nomor_plat" class="form-label">Nomor Plat</label>
                    <input type="text" class="form-control" name="nomor_plat" value="{{ old('nomor_plat') }}">
                    @if ($errors->has('nomor_plat'))
                        <span class="text-danger">
                            {{ $errors->first('nomor_plat') }}
                        </span>
                    @endif
                    </div>

                    {{-- Merk --}}
                    <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" class="form-control" name="merk" value="{{ old('merk') }}">
                    @if ($errors->has('merk'))
                        <span class="text-danger">
                            {{ $errors->first('merk') }}
                        </span>
                    @endif
                    </div>

                    {{-- Tipe --}}
                    <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <input type="text" class="form-control" name="tipe" value="{{ old('tipe') }}">
                     @if ($errors->has('tipe'))
                        <span class="text-danger">
                               {{ $errors->first('tipe') }}
                        </span>
                    @endif
                    </div>

                     {{-- Tahun --}}
                    <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" class="form-control" name="tahun" value="{{ old('tahun') }}">
                    @if ($errors->has('tahun'))
                        <span class="text-danger">
                            {{ $errors->first('tahun') }}
                        </span>
                    @endif
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
