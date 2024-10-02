<!DOCTYPE html>
<html>
<head>
    <title>Penilaian Mata Kuliah Pemrograman Internet</title>
</head>
<body>

<?php
// Fungsi untuk mengonversi nilai angka ke nilai huruf dan keterangan
function konversiNilai($nilai) {
    if ($nilai > 90 && $nilai <= 100) {
        return ["A", "Sangat Baik"];
    } elseif ($nilai > 80 && $nilai <= 90) {
        return ["B+", "Lumayan Baik"];
    } elseif ($nilai > 70 && $nilai <= 80) {
        return ["B", "Baik"];
    } elseif ($nilai > 60 && $nilai <= 70) {
        return ["C+", "Cukup Baik"];
    } elseif ($nilai > 50 && $nilai <= 60) {
        return ["C", "Cukup"];
    } elseif ($nilai > 40 && $nilai <= 50) {
        return ["D", "Kurang"];
    } else {
        return ["E", "Sangat Kurang"];
    }
}

// Proses setelah submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $nilaiAngka = $_POST['nilai'];

    // Validasi nilai agar berada di antara 0 - 100
    if ($nilaiAngka >= 0 && $nilaiAngka <= 100) {
        list($nilaiHuruf, $keterangan) = konversiNilai($nilaiAngka);
        
        // Tampilkan hasilnya
        echo "<h2>Hasil Penilaian:</h2>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "NIM: " . htmlspecialchars($nim) . "<br>";
        echo "Nilai Angka: " . htmlspecialchars($nilaiAngka) . "<br>";
        echo "Nilai Huruf: " . $nilaiHuruf . "<br>";
        echo "Keterangan: " . $keterangan . "<br>";
    } else {
        echo "<p style='color: red;'>Nilai harus berada di antara 0 - 100.</p>";
    }
}
?>

<!-- Form Input -->
<h2>Masukkan Data Siswa dan Nilai</h2>
<form method="POST" action="">
    Nama: <input type="text" name="nama" required><br><br>
    NIM: <input type="text" name="nim" required><br><br>
    Nilai Angka (0-100): <input type="number" name="nilai" min="0" max="100" required><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
