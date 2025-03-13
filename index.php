<?php
include 'Mahasiswa.php';

session_start(); 


if (!isset($_SESSION['mahasiswa_list'])) {
    $_SESSION['mahasiswa_list'] = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nim = $_POST['nim'] ?? '';
    $nama = $_POST['nama'] ?? '';

    if (!empty($nim) && !empty($nama)) {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->setData($nim, $nama);


        $_SESSION['mahasiswa_list'][] = serialize($mahasiswa);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset'])) {
    $_SESSION['mahasiswa_list'] = []; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
</head>
<body>
    <h2>Input Data Mahasiswa</h2>
    <form action="" method="post">
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" required><br><br>

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" required><br><br>

        <button type="submit" name="submit">Simpan</button>
    </form>
    
    <h2>Data Mahasiswa</h2>
    <?php
    if (!empty($_SESSION['mahasiswa_list'])) {
        foreach ($_SESSION['mahasiswa_list'] as $stored_mahasiswa) {
            $mahasiswa = unserialize($stored_mahasiswa);
            $mahasiswa->printData();
        }
    } else {
        echo "<strong>Belum ada data mahasiswa</strong>";
    }
    ?>

    <br>
    <form action="" method="post">
        <button type="submit" name="reset">Hapus Semua Data</button>
    </form>
</body>
</html>
