<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1" cellspacing="0" cellpading="10" style="width: 100%;">
        <tr>
            <th>#</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Pangkat</th>
            <th>Kesatuan</th>
            <th>Tahap</th>
            <th>Pinjaman</th>
            <th>jangka waktu</th>
            <th>TMT Angsuran</th>
            <th>Jumlah angsuran</th>
            <th>angsuran ke</th>
            <th>angsuran masuk</th>
            <th>tunggakan</th>
            <th>jumlah tunggakan</th>
            <th>keterangan</th>
        </tr>
        @forelse ($pinjams as $pinjam)
        <tbody>
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td><span class="badge badge-light">{{ $pinjam->nrp }}</span></td>
                <td><a href="" style="color: black;">{{ $pinjam->nama }}</a></td>
                <td>{{ $pinjam->corps }}</td>
                <td>{{ $pinjam->kesatuan }}</td>
                <td>{{ $pinjam->tahap }}</td>
                <td>{{ "IDR. " . number_format($pinjam->pinjaman, 0,',','.') }}</td>
                <td>{{ $pinjam->jk_waktu }}</td>
                <td>{{ $pinjam->tmt_angsuran }}</td>
                <td>{{ "Rp. " . number_format($pinjam->jml_angs, 0,',','.') }}</td>
                <td>{{ $pinjam->angs_ke }}</td>
                <td>{{ $pinjam->angsuran_masuk }}</td>
                <td>{{ $pinjam->tunggakan }}</td>
                <td>{{ "Rp. " . number_format( $pinjam->jml_tunggakan , 0,',','.') }}</td>
                <td>{{ $pinjam->keterangan }}</td>
            </tr>
        </tbody>
        @empty
        <tbody>
            <tr>
                <th colspan="16" style="color: red; text-align: center;">Data Empty!</th>
            </tr>
        </tbody>
        @endforelse
    </table>
</body>

</html>
