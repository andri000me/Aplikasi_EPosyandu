<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Posyandu</title>
</head>
<body>

    <button type="button" onclick="window.location.href='formTambahPosyandu.php'">TAMBAH DATA POSYANDU</button>
    <br><br>
    <table id="ttable"border="1">
    <thead>
        <tr>
            <th>ID Imunisasi</th>
            <!-- <th>Nama Anak</th>
            <th>ID Petugas</th>
            <th>ID Vaksin</th> -->
            <th>Tanggal Imunisasi</th>
            <th>Usia saat Vaksin</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Periode</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="content">

    </tbody>
  </table>
    <br>
  <button type="button" onclick="window.location.href='../home.html'">BACK TO HOME</button>
</body>
</html>