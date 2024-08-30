@extends('layout.master')

@section('content')
<section class="py-5">
    <div class="container-fluid px-2 px-lg-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between mb-5">
            <h2 class="text-dark fw-semibold mb-0">Input Distribution</h2>
            <a href="{{ route('index') }}" class="btn btn-light">
                <i class="bx bx-arrow-back"></i> Back
            </a>
        </div>
        <div class="card border-0">
            <div class="card-body p-5">
                <form action="{{ route('store') }}" method="post" id="formInput">
                    @csrf 
                    @if(isset($distribution))
                        <input type="hidden" name="id" value="{{ $distribution->id }}">
                    @endif
                    <div class="mb-3">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $distribution->nama_barang ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok">Stok Barang</label>
                        <input type="number" name="stok" id="stok" class="form-control" value="{{ $distribution->stok ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_terjual">Jumlah Terjual</label>
                        <input type="number" name="jumlah_terjual" id="jumlah_terjual" class="form-control" value="{{ $distribution->jumlah_terjual ?? '' }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tgl_transaksi">Tanggal Transaksi</label>
                        <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control" value="{{ $distribution->tanggal_transaksi ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_barang">Jenis Barang</label>
                        <select name="jenis_barang" id="jenis_barang" class="form-control" required>
                            <option value="">--Pilih Jenis Barang---</option>
                            @foreach($jenis_barang as $jenis)
                                <option value="{{ $jenis->id }}" {{ (isset($distribution) && $distribution->jenis_barang == $jenis->id) ? 'selected' : '' }}>
                                    {{ $jenis->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Tutup alert setelah 5 detik
        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);
    });
</script>
@endsection
