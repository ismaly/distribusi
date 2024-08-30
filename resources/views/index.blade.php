@extends('layout.master')

@section('content')
<section class="py-5">
    <div class="container-fluid px-2 px-lg-5">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h2 class="text-dark fw-semibold mb-0">Distribution Projects</h2>  
            <a href="{{ route('input-data') }}" class="btn btn-primary mb-3">
                <i class="bx bx-plus"></i> Add Project
            </a>
        </div>
            <a href="{{ route('transaksi') }}" class="btn btn-light mb-3">
               Transaction Data Table
            </a>
        <div class="card border-0">
            <div class="card-body p-5">
                {{-- <div class="mt-0 mb-3">
                    <input type="text" id="search-input" class="form-control" placeholder="Cari data..." style="width: 25%; align: right;" >
                </div> --}}
                <div class="table-responsive">
                    @include('layout.table')
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('success') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Check for success message and show modal -->
@if(session('success'))
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        });
    </script>
@endif


@endsection
