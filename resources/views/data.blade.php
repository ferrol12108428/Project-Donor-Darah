@extends('layout')
@section('content')
<h2 class="title-table text-center">Laporan Keluhan</h2>
<div style="display: flex; justify-content: center; margin-bottom: 30px">
    <a class="login-btn btn btn-primary" href="{{route('logout')}}" style="text-align: center">Logout</a>
    <div style="margin: 0 10px"></div>
    <a class="login-btn btn btn-primary" href="/" style="text-align: center">Home</a>
</div>
<div style="display: flex; justify-content: flex-end; align-items: center;">
    <!-- menggunakan method GET karna route akan masuk ke halaman data ini menggunakan ::get -->
    <form action="" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Cari Berdasarkan nama...." class="from-control" aria-label="default input example">
        <button type=" submit" class="login-btn btn btn-danger" style="margin-top: -17px;">Cari</button>
    </form>
    <!-- Refresh bailk lg ke ke route data karna nanti pas di klik Refresh 
        bersihin riwayat pencarian sebelumnya dan balikin lagi nya ke halaman data lagi -->
    <a href="{{ route('data')}}"> <button class="login-btn btn btn-danger" style="margin-left: 10px; margin-top: -15px;">Refresh</button> </a>
    <a href="{{route('export.pdf')}}"><button class="login-btn btn btn-primary" style="margin-left: 10px; margin-top: -15px;">Cetak PDF</button></a>
    <a href="{{route('export.excel')}}"><button class="login-btn btn btn-primary" style="margin-left: 10px; margin-top: -15px;">Cetak Excel</button></a>
</div>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<div style=" padding: 0 30px; margin-top: 10px;">
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telp</th>
                <th>Age</th>
                <th>BB</th>
                <th>Pesan</th>
                <th>Goldar</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($datas as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data['nama']}}</td>
                <td>{{$data['email']}}</td>
                <?php
                // substr_replace : mengubah karakter string
                // punya 3 argumen. argumen ke-1 : data yang mau dimasukin ke string
                // argumen ke-2 : muali dr index mana ubahnya
                // argumen ke-3 : sampai index mana diubahnya
                $telp = substr_replace($data->no_telp, "62", 0, 1)
                ?>
                <?php
                // kalau uda di response dat reportnya, cht wa nya data dr response di tampilkan 
                if ($data->response) {
                    $pesanWa = 'Hallo ' . $data->nama . '! pengaduan anda di' . $data->response['status'] . ', Berhasil pesan untuk anda :' . $data->response['pesan'];
                }
                // kalau belum di response pengaduannya, cht wa nya kaya gini
                else {
                    $pesanWa = 'Belum ada data response!';
                }
                ?>
                <td><a href=" https://wa.me/{{$telp}}?text={{$pesanWa}}" target="_blank">{{$telp}}</a></td>
                <td>{{$data['age']}}</td>
                <td>{{$data['BB']}}</td>
                <td>{{$data['pesan']}}</td>
                <td>
                    <a href="../assets/img/{{$data->foto}}" target="_blank">
                        <img src="{{asset('assets/img/'.$data->foto)}}" width="120">
                    </a>
                </td>
                <td>{{$data['goldar']}}</td>
                <td>
                    <form action="{{route('delete', $data->id)}}" method="post">
                        @csrf
                        <button class="btn btn-primary">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection