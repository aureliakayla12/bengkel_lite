@extends('template.layout')
@section('content')
<div class="row">
    <div class="col">
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">
                Tambah Data Pelanggan
            </a>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
            
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Nomor Hp</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $v)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $v->nama }}</td>
                <td>{{ $v->no_hp }}</td>
                <td>{{ $v->alamat }}</td>
                <td>
                    <form action="{{route('pelanggan.destroy', $v->pelanggan_id)}}" method="POST" style="display: inline">
                        {{csrf_field()}}
                        @method('DELETE')
                    <a href="{{route('pelanggan.edit', $v->pelanggan_id)}}" class="btn btn-success btn-sm">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this customer?')" class="btn btn-danger btn-sm">Hapus</button>
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