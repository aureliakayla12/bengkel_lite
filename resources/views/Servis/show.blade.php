@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">

    {{-- DETAIL SERVIS --}}
    <div class="card mb-3">
        <div class="card-header">
            Detail Servis
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">
                    <p>
                        <strong>Pelanggan :</strong>
                        {{ $servis->pelanggan->nama ?? '-' }}
                    </p>

                    <p>
                        <strong>Motor :</strong>
                        {{ $servis->motor->nomor_plat ?? '-' }}
                        -
                        {{ $servis->motor->merk ?? '-' }}
                    </p>

                    <p>
                        <strong>Mekanik :</strong>
                        {{ $servis->mekanik->nama ?? '-' }}
                    </p>
                </div>

                <div class="col-md-6">

                    <p>
                        <strong>Tanggal Servis :</strong>
                        {{ $servis->tanggal_servis }}
                    </p>

                    <p>
                        <strong>Status :</strong>

                        @if($servis->status == 'proses')
                            <span class="badge bg-warning">
                                Proses
                            </span>
                        @else
                            <span class="badge bg-success">
                                Selesai
                            </span>
                        @endif

                    </p>

                </div>

            </div>

            <hr>

            <p>
                <strong>Keluhan :</strong><br>
                {{ $servis->keluhan ?? '-' }}
            </p>

        </div>
    </div>


    {{-- DETAIL SPAREPART --}}
    <div class="card mb-3">

        <div class="card-header">
            Detail Sparepart
        </div>

        <div class="card-body table-responsive">

            <table class="table table-striped table-hover">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sparepart</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>

                    @php
                        $totalSparepart = 0;
                    @endphp

                    @forelse($servis->detailServis as $d)

                    @php
                        $totalSparepart += $d->subtotal;
                    @endphp

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $d->sparepart->nama ?? '-' }}
                        </td>

                        <td>
                            Rp {{ number_format($d->harga,0,',','.') }}
                        </td>

                        <td>
                            {{ $d->qty }}
                        </td>

                        <td>
                            Rp {{ number_format($d->subtotal,0,',','.') }}
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            Tidak ada sparepart digunakan
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- TOTAL --}}
    <div class="card">

        <div class="card-header">
            Ringkasan Biaya
        </div>

        <div class="card-body">

            <h6>
                Total Sparepart :
                <strong>
                    Rp {{ number_format($totalSparepart,0,',','.') }}
                </strong>
            </h6>

            <h6>
                Biaya Jasa :
                <strong>
                    Rp {{ number_format($servis->biaya_jasa,0,',','.') }}
                </strong>
            </h6>

            <hr>

            <h4>
                Grand Total :
                <strong>
                    Rp {{ number_format($servis->grand_total,0,',','.') }}
                </strong>
            </h4>

        </div>

        <div class="card-footer">

            <a href="{{ route('servis.index') }}"
               class="btn btn-secondary btn-sm">
                Kembali
            </a>

        </div>

    </div>

</div>

</div>

@endsection
