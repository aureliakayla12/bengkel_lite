@extends('template.layout')
@section('content')
    <div class="row">
        <div class="col">
            <a href="{{ route('sparepart.create') }}" class="btn btn-primary mb-3">
                Tambah Data Sparepart
            </a>
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Sparepart</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sparepart as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->nama }}</td>
                                     <td>{{ $v->stok }}</td>
                                    <td>{{ $v->harga }}</td>
                                    <td>
                                        <form action="{{route('sparepart.destroy', $v->sparepart_id)}}" method="POST"
                                            style="display: inline">
                                            {{csrf_field()}}
                                            @method('DELETE')
                                            <a href="{{route('sparepart.edit', $v->sparepart_id)}}" class="btn btn-success btn-sm">
                                                Edit
                                            </a>
                                            <button type="submit" onclick="return confirm('Are you sure want to delete this sparepart?')" class="btn btn-danger btn-sm">
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
