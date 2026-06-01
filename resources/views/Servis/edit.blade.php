@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Edit Data Servis
            </div>
            <form action="{{ route('servis.update', $dataeditservis->servis_id) }}"  method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="card-body">

                {{-- pelanggan --}}
                <div class="mb-3">
                <select name="pelanggan_id" class="form-control mb-2">
                @foreach($pelanggan as $p)
                    <option value="{{ $p->pelanggan_id }}"
                        {{ $dataeditservis->pelanggan_id == $p->pelanggan_id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
                </select>
                </div>

                {{-- motor --}}
                <div class="mb-3">
                <select name="motor_id" class="form-control mb-2">
                    @foreach($motor as $m)
                        <option value="{{ $m->motor_id }}"
                            {{ $dataeditservis->motor_id == $m->motor_id ? 'selected' : '' }}>
                            {{ $m->nomor_plat }}
                        </option>
                    @endforeach
                </select>
                </div>

                {{-- mekanik --}}
                <div class="mb-3">
                <select name="mekanik_id" class="form-control mb-2">
                @foreach($mekanik as $mk)
                    <option value="{{ $mk->mekanik_id }}"
                            {{ $dataeditservis->mekanik_id == $mk->mekanik_id ? 'selected' : '' }}>
                    {{ $mk->nama }}
                    </option>
                @endforeach
                </select>
                </div>

                {{-- Tanggal Servis --}}
                <div class="mb-3">
                <label class="form-label">Tanggal Servis</label>
                <input type="date" name="tanggal_servis" value="{{ $dataeditservis->tanggal_servis }}" class="form-control mb-2">
                </div>

                {{-- Keluhan --}}
                <div class="mb-3">
                    <label class="form-label">Keluhan</label>
                    <textarea name="keluhan" class="form-control mb-2">{{ $dataeditservis->keluhan }}</textarea>
                </div>

                {{-- Biaya Jasa --}}
                <div class="mb-3">
                <label class="form-label">Biaya Jasa</label>
                <input type="number" name="biaya_jasa" value="{{ $dataeditservis->biaya_jasa }}" class="form-control mb-2 biaya-jasa">
                </div>

                <div id="sparepart-wrapper">
                @foreach($dataeditservis->detailServis as $d)
                <div class="row mb-2 sparepart-row align-items-center">

                    <div class="col-md-5">
                        <select name="sparepart_id[]" class="form-control sparepart-select">
                        @foreach($sparepart as $s)
                        <option value="{{ $s->sparepart_id }}"  data-harga="{{ $s->harga }}"
                            {{ $d->sparepart_id == $s->sparepart_id ? 'selected' : '' }}> {{ $s->nama }}
                        </option>
                        @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                    <input type="number"  name="harga[]" value="{{ $d->harga }}" class="form-control harga-input text-end"  readonly>
                    </div>

                    <div class="col-md-2">
                    <input type="number" name="qty[]" value="{{ $d->qty }}" class="form-control qty-input text-center">
                    </div>

                    <div class="col-md-2">
                    <input type="number" value="{{ $d->subtotal }}" class="form-control subtotal-input" readonly>
                    </div>

                    <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-row">
                        Hapus
                    </button>
                    </div>

                </div>
            @endforeach
            </div>

            <button type="button" class="btn btn-primary btn-sm mt-2 mb-3" id="add-sparepart">
                + Tambah Sparepart
            </button>


                {{-- Grand Total --}}
                <div class="mb-3">
                    <label class="form-label">Grand Total</label>
                    <input type="number" name="grand_total" value="{{ $dataeditservis->grand_total }}" class="form-control" readonly>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="proses" {{ $dataeditservis->status=='proses'?'selected':'' }}>Proses</option>
                        <option value="selesai" {{ $dataeditservis->status=='selesai'?'selected':'' }}>Selesai</option>
                    </select>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    <a href="{{ route('servis.index') }}" class="btn btn-success btn-sm">Kembali</a>
                </div>

            </form>
                </div>
        </div>
    </div>
</div>

<script>
function hitungTotal() {
    let jasa =
        parseFloat(document.querySelector('.biaya-jasa').value) || 0;

    let totalSparepart = 0;

    document.querySelectorAll('.sparepart-row').forEach(function(row){
        let harga =
            parseFloat(row.querySelector('.harga-input').value) || 0;
        let qty =
            parseFloat(row.querySelector('.qty-input').value) || 0;
        let subtotal = harga * qty;

        row.querySelector('.subtotal-input').value = subtotal;

        totalSparepart += subtotal;
    });

    document.querySelector('[name="grand_total"]').value =
        jasa + totalSparepart;
}


// pilih sparepart
document.addEventListener('change', function(e){

    if(e.target.classList.contains('sparepart-select')){
        let harga =
            e.target.options[e.target.selectedIndex].dataset.harga || 0;
        let row = e.target.closest('.sparepart-row');

        row.querySelector('.harga-input').value = harga;

        hitungTotal();
    }

});


// qty + jasa
document.addEventListener('input', function(e){
    if(
        e.target.classList.contains('qty-input') ||
        e.target.classList.contains('biaya-jasa')
    ){
        hitungTotal();
    }

});


// tambah sparepart
document.getElementById('add-sparepart').addEventListener('click', function(){
    let wrapper = document.getElementById('sparepart-wrapper');
    let row = document.createElement('div');

    row.classList.add(
        'row',
        'mb-2',
        'sparepart-row',
        'align-items-center'
    );

    row.innerHTML = `
        <div class="col-md-5">
            <select name="sparepart_id[]" class="form-control sparepart-select">
                <option value="">-- Pilih Sparepart --</option>

                @foreach($sparepart as $s)
                    <option value="{{ $s->sparepart_id }}"
                            data-harga="{{ $s->harga }}">
                        {{ $s->nama }}
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
                   class="form-control qty-input">
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

    wrapper.appendChild(row);

});


// hapus row
document.addEventListener('click', function(e){

    if(e.target.classList.contains('remove-row')){

        let jumlah =
            document.querySelectorAll('.sparepart-row').length;

        if(jumlah > 1){

            e.target.closest('.sparepart-row').remove();

            hitungTotal();
        }

    }

});

</script>

@endsection