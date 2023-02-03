<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Laporan Perpustakaan</h1>
    <h4>{{ $identitas->nama_app }}</h4>
    <h4>{{ $identitas->alamat_app }}|{{ $identitas->nomor_hp }}</h4>
    <br>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Kondisi Buku Saat Dipinjam</th>
                <th>Kondisi Buku Saat Dikembalikan</th>
                <th>Denda</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $p)
            <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{$p->user->fullname}}</td>
                <td>{{$p->buku->judul}}</td>
                <td>{{$p->tanggal_peminjaman}}</td>
                <td>{{$p->tanggal_pengembalian}}</td>
                <td>{{$p->kondisi_buku_saat_dipinjam}}</td>
                <td>{{$p->kondisi_buku_saat_dikembalikan}}</td>
                <td>{{$p->denda}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>