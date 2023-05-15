<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pengaduan</title>
</head>

<body>
    <h2 style="text-align: center; margin-bottom: 20px;">Data Keseluruhan Pengaduan</h2>
    <table style="width: 100%;">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Age</th>
            <th>BB</th>
            <th>Tanggal</th>
            <th>Pesan</th>
            <th>Gambar</th>
        </tr>
        <?php $i = 1;  ?>
        @foreach ($datas as $data)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$data['nama']}}</td>
            <td>{{$data['email']}}</td>
            <td>{{$data['no_telp']}}</td>
            <td>{{$data['age']}}</td>
            <td>{{$data['BB']}}</td>
            <td>{{\Carbon\Carbon::parse($data['created_at'])->format('j F, Y')}}</td>
            <td>{{$data['pesan']}}</td>
            <td>
                <img src="assets/img/{{$data['foto']}}" width="80">
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>