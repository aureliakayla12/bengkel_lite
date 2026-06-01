@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Edit Data Motor
            </div>
            <form action="{{ route('motor.update', $dataeditmotor->motor_id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="card-body">

                    {{-- Pelanggan --}}
                    <div class="mb-3">
                    <label>Pelanggan</label>
                    <select name="pelanggan_id" class="form-control">
                        <option value="">
                            -- Pilih Pelanggan --
                        </option>
                    @foreach ($pelanggan as $p)
                        <option value="{{ $p->pelanggan_id }}"
                            {{ $dataeditmotor->pelanggan_id == $p->pelanggan_id ? 'selected' : '' }}>{{ $p->nama }}
                        </option>
                    @endforeach
                    </select>
                    @if ($errors->has('pelanggan_id'))
                        <span class="text-danger">
                            {{ $errors->first('pelanggan_id') }}
                        </span>
                    @endif
                    </div>


                    {{-- Merk --}}
                    <div class="mb-3">
                    <label>Merk</label>
                    <input type="text" name="merk" class="form-control" value="{{ $dataeditmotor->merk }}">
                    @if ($errors->has('merk'))
                        <span class="text-danger">
                            {{ $errors->first('merk') }}
                        </span>
                    @endif
                    </div>


                    {{-- Tipe --}}
                    <div class="mb-3">
                    <label>Tipe</label>
                    <input type="text" name="tipe" class="form-control" value="{{ $dataeditmotor->tipe }}">
                    @if ($errors->has('tipe'))
                        <span class="text-danger">
                            {{ $errors->first('tipe') }}
                        </span>
                    @endif
                    </div>


                    {{-- Nomor Plat --}}
                    <div class="mb-3">
                    <label>Nomor Plat</label><br>
                    <input type="text" name="nomor_plat" class="form-control" value="{{ $dataeditmotor->nomor_plat }}">
                    @if ($errors->has('nomor_plat'))
                        <span class="text-danger">
                            {{ $errors->first('nomor_plat') }}
                        </span>
                    @endif
                    </div>


                    {{-- Tahun --}}
                    <div class="mb-3">
                    <label>Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="{{ $dataeditmotor->tahun }}">
                    @if ($errors->has('tahun'))
                        <span class="text-danger">
                            {{ $errors->first('tahun') }}
                        </span>
                    @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    <a href="{{ route('motor.index') }}" class="btn btn-success btn-sm">Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection