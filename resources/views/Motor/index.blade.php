@extends('template.layout')
@section('content')
    <div class="row">
        <div class="col">
            <a href="{{ route('motor.create') }}" class="btn btn-primary mb-3">
                Tambah Data Motor
            </a>
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nomor Plat</th>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>Tahun</th>
                            <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($motor as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->pelanggan->nama }}</td>
                                    <td>{{ $v->nomor_plat }}</td>
                                    <td>{{ $v->merk }}</td>
                                    <td>{{ $v->tipe }}</td>
                                    <td>{{ $v->tahun }}</td>
                                    <td>
                                        <form action="{{route('motor.destroy', $v->motor_id)}}" method="POST"
                                            style="display: inline">
                                            {{csrf_field()}}
                                            @method('DELETE')
                                            <a href="{{route('motor.edit', $v->motor_id)}}" class="btn btn-success btn-sm">
                                                Edit
                                            </a>
                                            <button type="submit" onclick="return confirm('Are you sure want to delete this motorcycle?')" class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
