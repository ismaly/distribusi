<table class="table" id="searchable-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Jumlah Terjual</th>
            <th>Tanggal Transaksi</th>
            <th>Jenis Barang</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($distributions as $index => $distribution)
        <tr class="align-middle">
            <td>{{ $index + 1 }}</td>
            <td>{{ $distribution->nama_barang }}</td>
            <td>{{ $distribution->stok }}</td>
            <td>{{ $distribution->jumlah_terjual }}</td>
            <td>{{ \Carbon\Carbon::parse($distribution->tanggal_transaksi)->format('d-m-Y') }}</td>
            <td>{{ $distribution->jenisBarang->nama ?? 'Tidak Diketahui' }}</td>
            <td>
                <a class="dropdown-item d-flex align-items-center mb-1" href="{{ route('input-data', $distribution->id) }}">
                    <span class="badge bg-warning rounded-circle p-2 me-2">
                        <i class="bi bi-pencil-square text-white"></i> <!-- Ganti dengan ikon Bootstrap -->
                    </span>
                </a>

            <form action="{{ route('delete', $distribution->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="button" class="dropdown-item d-flex align-items-center text-danger"
                        style="border: none; background: none; width: 100%; text-align: left;"
                        data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                        data-url="{{ route('delete', $distribution->id) }}">
                    <span class="badge bg-danger rounded-circle p-2 me-2">
                        <i class="bi bi-trash-fill text-white"></i>
                    </span>
                </button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>