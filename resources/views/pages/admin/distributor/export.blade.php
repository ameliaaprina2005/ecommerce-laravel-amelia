<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Export Data Distributor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 6px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h4 style="text-align: center;">DATA DISTRIBUTOR</h4>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Distributor</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>Kontak</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($distributors as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_distributor }}</td>
                <td>{{ $item->kota }}</td>
                <td>{{ $item->provinsi }}</td>
                <td>{{ $item->kontak }}</td>
                <td>{{ $item->email }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6">Data distributor kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>