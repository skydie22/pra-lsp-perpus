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
                <th style="border: 1px solid black">No</th>
                <th style="border: 1px solid black">Nama Anggota</th>
                <th style="border: 1px solid black">Judul Buku</th>
                <th style="border: 1px solid black">Tanggal Peminjaman</th>
                <th style="border: 1px solid black">Tanggal Pengembalian</th>
                <th style="border: 1px solid black">Kondisi Buku Saat Dipinjam</th>
                <th style="border: 1px solid black">Kondisi Buku Saat Dikembalikan</th>
                <th style="border: 1px solid black">Denda</th>

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