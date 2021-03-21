<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="table-responsive">
            <table class="table table-hover">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $kpr->nama }}</td>
                        </tr>
                        <tr>
                            <td>Pangkat</td>
                            <td>:</td>
                            <td>{{ $kpr->pangkat }}</td>
                        </tr>
                        <tr>
                            <td>NRP</td>
                            <td>:</td>
                            <td>{{ $kpr->nrp }}</td>
                        </tr>
                        <tr>
                            <td>Kesatuan</td>
                            <td>:</td>
                            <td>{{ $kpr->kesatuan }}</td>
                        </tr>
                        <tr>
                            <td>Tahap</td>
                            <td>:</td>
                            <td>{{ $kpr->tahap }}</td>
                        </tr>
                        <tr>
                            <td>Pinjaman</td>
                            <td>:</td>
                            <td>{{ $kpr->pinjaman }}</td>
                        </tr>
                        <tr>
                            <td>Jangka Waktu</td>
                            <td>:</td>
                            <td>{{ $kpr->jk_waktu }}</td>
                        </tr>
                        <tr>
                            <td>Bulan angsuran</td>
                            <td>:</td>
                            <td>{{ $kpr->tmt_angsuran }}</td>
                        </tr>

                        <tr>
                            <td>Tahap</td>
                            <td>:</td>
                            <td>{{ $kpr->tahap }}</td>
                        </tr>

                        <tr>
                            <td>Jumlah angsuran</td>
                            <td>:</td>
                            <td>{{ $kpr->jml_angs }}</td>
                        </tr>

                        <tr>
                            <td>angsuran ke</td>
                            <td>:</td>
                            <td>{{ $kpr->angs_ke }}</td>
                        </tr>
                        <tr>
                            <td>Angsuran masuk</td>
                            <td>:</td>
                            <td>{{ $kpr->angsuran_masuk }}</td>
                        </tr>

                        <tr>
                            <td>Tunggakan</td>
                            <td>:</td>
                            <td>{{ $kpr->tunggakan }}</td>
                        </tr>

                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td>{{ $kpr->jml_tunggakan }}</td>
                        </tr>

                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>{{ $kpr->keterangan }}</td>
                        </tr>

                        <tr>
                            <td>status</td>
                            <td>:</td>
                            <td>{{ $kpr->status }}</td>
                        </tr>
            </table>
        </div>
</body>
</html>
