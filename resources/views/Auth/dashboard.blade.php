@extends('template.layout')

@section('content')

<div class="row">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h5>Total Pelanggan</h5>
                <h2>{{ $totalPelanggan }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h5>Total Motor</h5>
                <h2>{{ $totalMotor }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h5>Total Mekanik</h5>
                <h2>{{ $totalMekanik }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h5>Total Sparepart</h5>
                <h2>{{ $totalSparepart }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <h3>Selamat Datang, {{ Auth::user()->name }}</h3>

                <p>
                    Anda berhasil login ke Sistem Informasi Bengkel Lite.
                </p>

                <hr>

                <h5>Total Servis : {{ $totalServis }}</h5>

            </div>

            <div class="card-footer">
                <a href="{{ route('logout') }}"
                   class="btn btn-danger btn-sm">
                    Logout
                </a>
            </div>

        </div>
    </div>

</div>

@endsection