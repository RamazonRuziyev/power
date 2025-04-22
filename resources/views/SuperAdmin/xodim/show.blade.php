@extends('SuperAdmin.layout.master')
@section('title','Administrator show')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header d-flex  align-items-center justify-content-around">
                            <h3 class="card-title">Ariza Kurish</h3>
                            <a class="btn btn-success" id="downloadWord" href="">Word</a>
                            <a class="btn btn-success" id="printTable" href="">Print</a>
                            <a class="btn btn-success" id="downloadExcel" href="#">Excel</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data-table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>FIO</th>
                                <th>MFY</th>
                                <th>Qishloqg'i</th>
                                <th>Telefon</th>
                                <th>Masul Xodim</th>
                                <th>Aavsifi</th>
                                <th>Natija</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($petitions as $key => $petition)
                                <tr>
                                    <td>{{ ($petitions->currentPage() - 1) * $petitions->perPage() + ($loop->index + 1) }}</td>
                                    <td>{{ $petition->fio }}</td>
                                    <td>{{ $petition->mfy }}</td>
                                    <td>{{ $petition->village }}</td>
                                    <td>{{ $petition->phone }}</td>
                                    <td>
                                            {{ $petition->employee_name}}
                                    </td>
                                    <td>{{ $petition->description }} </td>
                                    <td>
                                        @if($petition->status == 1)
                                            <span class="btn btn-success">Qabul qilingan</span>
                                        @elseif($petition->status == 2)
                                            <span class="btn btn-danger">Bekor qilingan</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div style="margin: 20px;"> {{$petitions->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        // Excel
        document.getElementById('downloadExcel').addEventListener('click', function () {
            var table = document.getElementById('data-table');

            // Clone the table to manipulate the content without affecting the original table
            var clonedTable = table.cloneNode(true);

            // Remove the "Action" column from the cloned table
            var headers = clonedTable.querySelectorAll('th');
            var bodyRows = clonedTable.querySelectorAll('tr');

            // Find the index of the "Action" column
            var actionColumnIndex = Array.from(headers).findIndex(header => header.textContent.trim() === "Action");

            // Remove the "Action" column from the headers
            if (actionColumnIndex !== -1) {
                headers[actionColumnIndex].remove();

                // Remove the "Action" column from each row
                bodyRows.forEach(row => {
                    var cells = row.querySelectorAll('td');
                    if (cells[actionColumnIndex]) {
                        cells[actionColumnIndex].remove();
                    }
                });
            }

            // Now export the modified table to Excel
            var wb = XLSX.utils.table_to_book(clonedTable, {sheet: "Shrtnoma"});
            XLSX.writeFile(wb, "shrtnoma.xlsx");
        });

        // Print
        document.getElementById('printTable').addEventListener('click', function () {
            var table = document.getElementById('data-table');

            // Clone the table to manipulate the content without affecting the original table
            var clonedTable = table.cloneNode(true);

            // Remove the "Action" column from the cloned table
            var headers = clonedTable.querySelectorAll('th');
            var bodyRows = clonedTable.querySelectorAll('tr');

            // Find the index of the "Action" column
            var actionColumnIndex = Array.from(headers).findIndex(header => header.textContent.trim() === "Action");

            // Remove the "Action" column from the headers
            if (actionColumnIndex !== -1) {
                headers[actionColumnIndex].remove();

                // Remove the "Action" column from each row
                bodyRows.forEach(row => {
                    var cells = row.querySelectorAll('td');
                    if (cells[actionColumnIndex]) {
                        cells[actionColumnIndex].remove();
                    }
                });
            }

            // Open a new window for print preview and add the modified table
            var printWindow = window.open('', '', 'height=500, width=800');
            printWindow.document.write('<html><head><title>Chop etish</title><style>table {width: 100%;border-collapse: collapse;}th, td {border: 1px solid black;padding: 8px;text-align: center;}</style></head><body>');
            printWindow.document.write(clonedTable.outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });

        // Word
        document.getElementById('downloadWord').addEventListener('click', function () {
            var table = document.getElementById('data-table');

            // Clone the table to manipulate the content without affecting the original table
            var clonedTable = table.cloneNode(true);

            // Remove the "Action" column from the cloned table
            var headers = clonedTable.querySelectorAll('th');
            var bodyRows = clonedTable.querySelectorAll('tr');

            // Find the index of the "Action" column
            var actionColumnIndex = Array.from(headers).findIndex(header => header.textContent.trim() === "Action");

            // Remove the "Action" column from the headers
            if (actionColumnIndex !== -1) {
                headers[actionColumnIndex].remove();

                // Remove the "Action" column from each row
                bodyRows.forEach(row => {
                    var cells = row.querySelectorAll('td');
                    if (cells[actionColumnIndex]) {
                        cells[actionColumnIndex].remove();
                    }
                });
            }

            // Wrap the table HTML in a Word document structure
            var htmlContent = `
    <html xmlns:w="urn:schemas-microsoft-com:office:word">
    <head>
        <meta charset="UTF-8">
        <style>
            table { border-collapse: collapse; width: 100%; }
            th, td { border: 1px solid black; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
        </style>
    </head>
    <body>
        <table border="1">
            ${clonedTable.outerHTML}
        </table>
    </body>
    </html>
`;

            // Create a Blob with the Word MIME type
            var blob = new Blob([htmlContent], { type: 'application/msword' });

            // Save as a Word file
            saveAs(blob, 'shrtnoma.doc');
        });
    </script>
@endpush
