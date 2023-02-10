<?php

$showData = false;

if (isset($_POST['tKirim'])) {


    $showData = true;


    $nama = htmlspecialchars($_POST['nama']);
    $gajiPokok = htmlspecialchars($_POST['gajiPokok']);
    $statusPernikahan = $_POST['nikah'];
    $jumlahAnak = $_POST['JumlahAnak'];
    $nominalTransportasi = $_POST['nominalTransportasi'];
    $totalKerja = $_POST['totalKerja'];
    $bpjs = $_POST['bpjs'];

    if ($statusPernikahan == 'sudah') {


        $tIstri = $gajiPokok * 5 / 100;


        $jumlahkeluarga = 2 + $jumlahAnak;


        if ($jumlahAnak == 1) {


            $tTunjanganAnak = $gajiPokok * 2 / 100;
        } elseif ($jumlahAnak == 2) {

            $tTunjanganAnak = $gajiPokok * 4 / 100;
        } elseif ($jumlahAnak == 0) {

            $tTunjanganAnak = 0;
        } else {
            $tTunjanganAnak = $gajiPokok * 4 / 100;
        }


        $tTunjanganBeras = $gajiPokok * 3 / 100;

        $transportasi = $nominalTransportasi * $totalKerja;

        $total = $gajiPokok + $tIstri + $tTunjanganAnak + $tTunjanganBeras + $transportasi;
    } else {
        $tIstri = 0;
        $tTunjanganAnak = 0;
        $jumlahkeluarga = 1;
        $tTunjanganBeras = $gajiPokok * 3 / 100;

        $transportasi = $nominalTransportasi * $totalKerja;

        $total = $gajiPokok + $tTunjanganBeras + $transportasi;
    }

    if ($bpjs == 1) {

        $gajiKeluar = $jumlahkeluarga * 200000;

        $totalAkhir = $total - $gajiKeluar;
        $totalAkhir;
    } elseif ($bpjs == 2) {

        $gajiKeluar = $jumlahkeluarga * 110000;

        $totalAkhir = $total - $gajiKeluar;
    } elseif ($bpjs == 3) {

        $gajiKeluar = $jumlahkeluarga * 35000;

        $totalAkhir = $total - $gajiKeluar;
    }
}


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penggajian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="assets/Images/muda.png">
</head>

<body>
    <!-- start Navbar -->
    <div class="header">
        <img src="assets/Images/header.jpg" alt="" width="100%">
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">

        <div class="container-fluid">
            <a class="navbar-brand" href="#">Penggajian</a>
        </div>
    </nav>
    <!-- end Navbar -->


    <?php if ($showData == false) : ?>


    <!-- start Content -->

    <div class="container mt-5">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama anda">
            </div>
            <div class="mb-3">
                <label for="jumlahGaji" class="form-label">Jumlah Gaji</label>
                <input type="text" name="gajiPokok" class="form-control" id="jumlahGaji"
                    placeholder="Masukkan nama anda">
            </div>
            <div class="mb-3">
                <p>Status Pernikahan: </p>
                  <input type="radio" id="sudah" name="nikah" value="sudah">
                  <label for="sudah">Sudah Menikah</label><br>
                  <input type="radio" id="belum" name="nikah" value="belum">
                  <label for="belum">Belum Menikah </label><br>
            </div>
            <div class="mb-3">
                <label for="jumlahAnak" class="form-label">Jumlah Anak</label>
                <input type="number" name="JumlahAnak" min="0" class="form-control" placeholder="Masukkan jumlah anak">
            </div>
            <div class="mb-3">
                <label for="nominalTransportasi" class="form-label">Nominal Transportasi</label></label>
                <input type="number" min="0" class="form-control" id="nominalTransportasi" name="nominalTransportasi"
                    placeholder="Masukkan biaya transportasi dalam sehari">
            </div>
            <div class="mb-3">
                <label for="totalKerja" name="totalKerja" class="form-label">Total Hari Kerja</label></label>
                <input type="number" min="0" max="31" class="form-control" name="totalKerja" id="totalKerja"
                    placeholder="Masukkan total hari kerja dalam 1 bulan">
            </div>
            <div class="mb-3">
                <p>Kelas Bpjs: </p>
                  <input type="radio" id="1" name="bpjs" value="1">
                  <label for="1">Kelas I</label><br>
                  <input type="radio" id="2" name="bpjs" value="2">
                  <label for="2">Kelas II </label><br>
                  <input type="radio" id="3" name="bpjs" value="3">
                  <label for="3">Kelas III </label><br>
            </div>
            <div class="mb-3">
                <button type="submit" name="tKirim" class="btn btn-primary">Kirim</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
    <!-- end content -->
    <?php endif; ?>


    <?php if ($showData == true) : ?>

    <!-- start hasil cek -->
    <div class="container mt-5">
        <h4><i>Nama Karyawan : <?= $nama ?></i></h4>
        <h3><b>Pendapatan :</b></h3>
        <table cellpadding="15">
            <tr>
                <td>1.</td>
                <td>Gaji Pokok</td>
                <td>:</td>
                <td><?= $gajiPokok ?></td>
            </tr>
            <tr>
                <td>2. </td>
                <td>Tunjangan Suami/istri</td>
                <td>:</td>
                <td><?= $tIstri; ?></td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Tunjangan anak</td>
                <td>:</td>
                <td><?= $tTunjanganAnak ?></td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Tunjangan Beras</td>
                <td>:</td>
                <td><?= $tTunjanganBeras ?></td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Transport</td>
                <td>:</td>
                <td><?= $transportasi ?></td>
            </tr>

        </table>
        <h3 class="mt-3"><b>Potongan :</b></h3>
        <table cellpadding="15">
            <tr>
                <td>1.</td>
                <td>BPJS Kesehatan</td>
                <td>:</td>
                <td><?= $gajiKeluar ?></td>
            </tr>
        </table>
        <h3 class="mt-3"><b>Gaji Bersih : <?= $totalAkhir ?></b></h3>

        <a href="" class="mt-3 mb-5 btn btn-primary">Cek Ulang</a>


    </div>



    <!-- end akhir cek -->

    <?php endif ?>




    <!-- start script -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>