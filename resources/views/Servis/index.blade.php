@extends('template.layout')
@section('content')
<div class="row">
    <div class="col">
        <a href="{{ route('servis.create') }}" class="btn btn-primary mb-3">
            Tambah Data Servis
        </a>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Motor</th>
                            <th>Mekanik</th>
                            <th>Tanggal Servis</th>
                            <th>Keluhan</th>
                            <th>Biaya Jasa</th>
                            <th>Total Sparepart</th>
                            <th>Grand Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($servis as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->pelanggan->nama ?? '-' }}</td>
                            <td>{{ $v->motor->nomor_plat ?? '-' }}</td>
                            <td>{{ $v->mekanik->nama ?? '-' }}</td>
                            <td>{{ $v->tanggal_servis }}</td>
                            <td>{{ $v->keluhan }}</td>
                            <td>Rp {{ number_format($v->biaya_jasa, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($v->detailServis->sum('subtotal'), 0, ',', '.') }}</td>
                            <td><strong>Rp {{ number_format($v->grand_total, 0, ',', '.') }}</strong></td>
                            <td>
                                @if($v->status == 'proses')
                                    <span class="badge bg-warning">Proses</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>

                            <td>
                                <form action="{{ route('servis.destroy', $v->servis_id) }}" method="POST" style="display:inline;">
                                    {{ csrf_field() }}
                                    @method('DELETE')

                                    <a href="{{ route('servis.show', $v->servis_id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('servis.edit', $v->servis_id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
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