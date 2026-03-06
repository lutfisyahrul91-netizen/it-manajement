<!DOCTYPE html>
<html>
<head>
    <title>Laporan Inventaris Monitor</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN DATA INVENTARIS MONITOR</h2>
        <p>Dicetak pada: {{ date('d-m-Y H:i') }} | Oleh: {{ auth()->user()->nama_user }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No. Seri</th>
                <th>Merk</th>
                <th>Tahun</th>
                <th>Pemeliharaan</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monitors as $m) <tr>
            <td>{{ $m->no_seri }}</td>
            <td>{{ $m->merk }}</td>
            <td>{{ $m->tahun_pengadaan }}</td>
            <td>{{ $m->pemeliharaan }}</td>
            <td>{{ $m->kondisi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>