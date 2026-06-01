@extends('template.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Servis
            </div>

            <form action="{{ route('servis.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">

                    {{-- Pelanggan --}}
                    <div class="mb-3">
                        <label class="form-label">Pelanggan</label>
                        <select name="pelanggan_id" class="form-control">
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach($pelanggan as $p)
                                <option value="{{ $p->pelanggan_id }}"
                                    {{ old('pelanggan_id') == $p->pelanggan_id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('pelanggan_id'))
                            <span class="text-danger">{{ $errors->first('pelanggan_id') }}</span>
                        @endif
                    </div>

                    {{-- Motor --}}
                    <div class="mb-3">
                        <label class="form-label">Motor</label>
                        <select name="motor_id" class="form-control">
                            <option value="">-- Pilih Motor --</option>
                            @foreach($motor as $m)
                                <option value="{{ $m->motor_id }}"
                                    {{ old('motor_id') == $m->motor_id ? 'selected' : '' }}>
                                    {{ $m->nomor_plat }} - {{ $m->merk }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('motor_id'))
                            <span class="text-danger">{{ $errors->first('motor_id') }}</span>
                        @endif
                    </div>

                    {{-- Mekanik --}}
                    <div class="mb-3">
                        <label class="form-label">Mekanik</label>
                        <select name="mekanik_id" class="form-control">
                            <option value="">-- Pilih Mekanik --</option>
                            @foreach($mekanik as $mk)
                                <option value="{{ $mk->mekanik_id }}"
                                    {{ old('mekanik_id') == $mk->mekanik_id ? 'selected' : '' }}>
                                    {{ $mk->nama }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('mekanik_id'))
                            <span class="text-danger">{{ $errors->first('mekanik_id') }}</span>
                        @endif
                    </div>

                    {{-- Tanggal Servis --}}
                    <div class="mb-3">
                        <label class="form-label">Tanggal Servis</label>
                        <input type="date" name="tanggal_servis" class="form-control" value="{{ old('tanggal_servis') }}">
                        @if ($errors->has('tanggal_servis'))
                            <span class="text-danger">{{ $errors->first('tanggal_servis') }}</span>
                        @endif
                    </div>

                    {{-- Keluhan --}}
                    <div class="mb-3">
                        <label class="form-label">Keluhan</label>
                        <textarea name="keluhan" class="form-control">{{ old('keluhan') }}</textarea>
                    </div>

                    {{-- Biaya Jasa --}}
                    <div class="mb-3">
                        <label class="form-label">Biaya Jasa</label>
                        <input type="number" name="biaya_jasa" class="form-control"
                               value="{{ old('biaya_jasa', 0) }}">
                    </div>


                <label class="form-label">Sparepart</label>
                <div id="sparepart-wrapper">
                    <div class="row mb-2 sparepart-row">

                        <div class="col-md-5">
                            <select name="sparepart_id[]" class="form-control sparepart-select">
                                <option value="">-- Pilih Sparepart --</option>
                                @foreach($sparepart as $s)
                                <option value="{{ $s->sparepart_id }}" data-harga="{{ $s->harga }}">
                                    {{ $s->nama }} (Stok: {{ $s->stok }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                        <input type="number" class="form-control harga-input" name="harga[]" readonly placeholder="Harga">
                        </div>

                        <div class="col-md-2">
                        <input type="number"
       name="qty[]"
       class="form-control qty-input"
       min="1"
       placeholder="Qty">
                        </div>

                        <div class="col-md-2">
                        <input type="number" class="form-control subtotal-input" readonly placeholder="Subtotal">
                        </div>

                        <div class="col-md-1">
                        <button type="button" class="btn btn-danger remove-row">
                            Hapus
                        </button>
                        </div>

                    </div>
                </div>

            <button type="button" class="btn btn-primary btn-sm mt-2" id="add-sparepart">
                + Tambah Sparepart
            </button>

                    {{-- Grand Total --}}
                    <div class="mb-3"><br>
                        <label class="form-label">Grand Total</label>
                        <input type="number" name="grand_total" class="form-control" value="{{ old('grand_total', 0) }}" readonly>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>
                                Proses
                            </option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{ route('servis.index') }}" class="btn btn-success btn-sm">Kembali</a>
                </div>

            </form>

        </div>
    </div>
</div>

<script>

function hitungTotal() {
    let jasa = parseFloat(document.querySelector('[name="biaya_jasa"]').value) || 0;

    let totalSparepart = 0;

    document.querySelectorAll('.sparepart-row').forEach(row => {

        let harga = parseFloat(row.querySelector('.harga-input').value) || 0;
        let qty = parseFloat(row.querySelector('.qty-input').value) || 0;

        let subtotal = harga * qty;

        row.querySelector('.subtotal-input').value = subtotal;

        totalSparepart += subtotal;
    });

    document.querySelector('[name="grand_total"]').value = jasa + totalSparepart;
}


// pilih sparepart → ambil harga
document.addEventListener('change', function(e) {

    if (e.target.classList.contains('sparepart-select')) {

        let harga = e.target.options[e.target.selectedIndex].dataset.harga || 0;

        let row = e.target.closest('.sparepart-row');
        row.querySelector('.harga-input').value = harga;

        hitungTotal();
    }
});


// qty berubah
document.addEventListener('input', function(e) {

    if (e.target.classList.contains('qty-input')) {
        hitungTotal();
    }

    if (e.target.name === 'biaya_jasa') {
        hitungTotal();
    }
});


// =======================
// TAMBAH SPAREPART ROW
// =======================
document.getElementById('add-sparepart').addEventListener('click', function() {

    let wrapper = document.getElementById('sparepart-wrapper');

    let newRow = document.createElement('div');
    newRow.classList.add('row', 'mb-2', 'sparepart-row');

    newRow.innerHTML = `
<div class="col-md-5">
    <select name="sparepart_id[]" class="form-control sparepart-select">
        <option value="">-- Pilih Sparepart --</option>

        @foreach($sparepart as $s)
            <option value="{{ $s->sparepart_id }}"
                    data-harga="{{ $s->harga }}">
                {{ $s->nama }} (Stok: {{ $s->stok }})
            </option>
        @endforeach

    </select>
</div>

<div class="col-md-2">
    <input type="number"
           name="harga[]"
           class="form-control harga-input"
           readonly>
</div>

<div class="col-md-2">
    <input type="number"
       name="qty[]"
       class="form-control qty-input"
       min="1"
       placeholder="Qty">
</div>

<div class="col-md-2">
    <input type="number"
           class="form-control subtotal-input"
           readonly>
</div>

<div class="col-md-1">
    <button type="button"
            class="btn btn-danger remove-row">
        Hapus
    </button>
</div>
`;

    wrapper.appendChild(newRow);
});

document.addEventListener('click', function(e){

    if(e.target.classList.contains('remove-row')){

        let jumlahRow =
            document.querySelectorAll('.sparepart-row').length;

        if(jumlahRow > 1){
            e.target.closest('.sparepart-row').remove();
            hitungTotal();
        }
    }
});

hitungTotal();

</script>

@endsection

