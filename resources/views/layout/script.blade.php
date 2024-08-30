<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteConfirmationModal = document.getElementById('deleteConfirmationModal');
        deleteConfirmationModal.addEventListener('show.bs.modal', function (event) {
            // Tombol yang memicu modal
            var button = event.relatedTarget;
            // Dapatkan URL dari tombol data-url
            var url = button.getAttribute('data-url');
            // Dapatkan form dalam modal
            var deleteForm = deleteConfirmationModal.querySelector('#deleteForm');
            // Setel URL form dengan URL yang diambil dari tombol
            deleteForm.action = url;
        });
    });
</script>


<script>
    $(document).ready(function() {
        var table = $('#searchable-table').DataTable({
        });

        $('#search-input').on('keyup', function() {
            table.search(this.value).draw(); // Filter table based on input value
        });
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#searchable-table2').DataTable({
            "order": [[3, "desc"]] // Sorting by "Jumlah Terjual" column by default
        });

        // Global search
        $('#search-input').on('keyup', function() {
            table.search(this.value).draw(); // Filter table based on input value
        });

        // Date range filter
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var startDate = new Date($('#start-date').val());
                var endDate = new Date($('#end-date').val());
                var transactionDateStr = data[4]; // Assuming the date is in the 5th column (index 4)

                // Convert transactionDateStr from d-m-Y to a JavaScript Date object
                var parts = transactionDateStr.split('-');
                var transactionDate = new Date(parts[2], parts[1] - 1, parts[0]);

                if (
                    (isNaN(startDate) && isNaN(endDate)) || // No filter
                    (isNaN(startDate) && transactionDate <= endDate) || // Start date not set
                    (startDate <= transactionDate && isNaN(endDate)) || // End date not set
                    (startDate <= transactionDate && transactionDate <= endDate) // Both dates are set
                ) {
                    return true;
                }
                return false;
            }
        );

        // Apply date range filter when dates are selected
        $('#start-date, #end-date').on('change', function() {
            table.draw();
        });
    });
</script>

{{-- <script>
    // Menambahkan metode sorting khusus untuk format tanggal "dd-mm-yyyy"
    jQuery.extend(jQuery.fn.dataTableExt.oSort, {
        "date-dd-mmm-yyyy-pre": function (date) {
            date = date.split('-');
            return (new Date(date[2], date[1] - 1, date[0])).getTime();
        },
        "date-dd-mmm-yyyy-asc": function (a, b) {
            return ((a < b) ? -1 : ((a > b) ? 1 : 0));
        },
        "date-dd-mmm-yyyy-desc": function (a, b) {
            return ((a < b) ? 1 : ((a > b) ? -1 : 0));
        }
    });

    $(document).ready(function() {
        $('#searchable-table').DataTable({
            "order": [[1, "asc"], [4, "asc"]], // Urutkan berdasarkan kolom "Nama Barang" dan "Tanggal Transaksi"
            "columnDefs": [
                { "type": "date-dd-mmm-yyyy", "targets": 4 } // Menentukan kolom tanggal untuk sorting khusus
            ]
        });
    });
</script> --}}


{{-- <script>
    // Menambahkan metode sorting khusus untuk format tanggal "dd-mm-yyyy"
    jQuery.extend(jQuery.fn.dataTableExt.oSort, {
        "date-dd-mmm-yyyy-pre": function (date) {
            date = date.split('-');
            return (new Date(date[2], date[1] - 1, date[0])).getTime();
        },
        "date-dd-mmm-yyyy-asc": function (a, b) {
            return ((a < b) ? -1 : ((a > b) ? 1 : 0));
        },
        "date-dd-mmm-yyyy-desc": function (a, b) {
            return ((a < b) ? 1 : ((a > b) ? -1 : 0));
        }
    });

    $(document).ready(function() {
        $('#searchable-table2').DataTable({
            "order": [[1, "asc"], [4, "asc"]], // Urutkan berdasarkan kolom "Nama Barang" dan "Tanggal Transaksi"
            "columnDefs": [
                { "type": "date-dd-mmm-yyyy", "targets": 4 } // Menentukan kolom tanggal untuk sorting khusus
            ]
        });
    });
</script> --}}

