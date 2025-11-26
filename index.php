<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $kelas  = $_POST['kelas'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO absensi (nama, kelas, status, tanggal) 
              VALUES ('$nama', '$kelas', '$status', '$tanggal')";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Absensi Siswa</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #43cea2, #185a9d);
            margin:0;
            padding:0;
        }
        .container{
            width:400px;
            background:#fff;
            margin:50px auto;
            padding:20px;
            border-radius:15px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
        }
        h1{
            text-align:center;
            margin-bottom:20px;
            color:#185a9d;
        }
        input, select, button{
            width:90%;
            padding:10px;
            margin-top:10px;
            border-radius:8px;
            border:1px solid #ccc;
            font-size:14px;
        }
        button{
            background:#43cea2;
            color:#fff;
            font-weight:bold;
            border:none;
            cursor:pointer;
        }
        button:hover{
            background:#36b190;
        }
        table{
            width:100%;
            margin-top:20px;
            border-collapse:collapse;
        }
        th, td{
            border:1px solid #ddd;
            padding:8px;
            text-align:center;
            font-size:13px;
        }
        th{
            background:#185a9d;
            color:#fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Absensi Siswa</h1>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Siswa" required>
        <input type="text" name="kelas" placeholder="Kelas" required>
        <select name="status" required>
            <option value="">Pilih Status</option>
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alpha">Alpha</option>
        </select>
        <input type="date" name="tanggal" required>
        <button type="submit" name="simpan">Simpan Absensi</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM absensi ORDER BY id DESC");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['nama'] ?></td>
            <td><?= $d['kelas'] ?></td>
            <td><?= $d['status'] ?></td>
            <td><?= $d['tanggal'] ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
