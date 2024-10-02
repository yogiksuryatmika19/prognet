<?php
// Data siswa
$siswa = [
    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
];

// Fungsi untuk menghitung rata-rata nilai
function hitungRataRata($matematika, $bahasa_inggris, $ipa) {
    return ($matematika + $bahasa_inggris + $ipa) / 3;
}

// Fungsi untuk menentukan mata pelajaran dengan nilai terendah
function cariMataPelajaranTerendah($matematika, $bahasa_inggris, $ipa) {
    $nilai = [
        'matematika' => $matematika,
        'bahasa_inggris' => $bahasa_inggris,
        'ipa' => $ipa
    ];
    // Cari nilai terendah
    $terendah = array_keys($nilai, min($nilai));
    return ucfirst(str_replace('_', ' ', $terendah[0]));
}

// Inisialisasi penghitung jumlah lulus dan tidak lulus
$total_lulus = 0;
$total_tidak_lulus = 0;

// Tampilkan header
echo "Daftar Siswa:<br>";
echo "<hr>";

// Perulangan untuk setiap siswa
foreach ($siswa as $data) {
    $nama = $data["nama"];
    $matematika = $data["matematika"];
    $bahasa_inggris = $data["bahasa_inggris"];
    $ipa = $data["ipa"];

    // Hitung rata-rata nilai
    $rata_rata = hitungRataRata($matematika, $bahasa_inggris, $ipa);

    // Tentukan status kelulusan
    if ($rata_rata >= 75) {
        $status = "Lulus";
        $total_lulus++; // Tambah ke total lulus
    } else {
        $status = "Tidak Lulus";
        $total_tidak_lulus++; // Tambah ke total tidak lulus
    }

    // Tampilkan data siswa, nilai rata-rata, dan status
    echo "Nama: $nama<br>";
    echo "Nilai Rata-Rata: " . number_format($rata_rata, 2) . "<br>";
    echo "Status: $status<br>";

    // Jika tidak lulus, tampilkan mata pelajaran dengan nilai terendah
    if ($status == "Tidak Lulus") {
        $mata_pelajaran_terendah = cariMataPelajaranTerendah($matematika, $bahasa_inggris, $ipa);
        echo "Mata pela jaran yang perlu diperbaiki: $mata_pelajaran_terendah<br>";
    }

    echo "<hr>";
}

// Tampilkan total siswa yang lulus dan tidak lulus
echo "Total Siswa Lulus: $total_lulus<br>";
echo "Total Siswa Tidak Lulus: $total_tidak_lulus<br>";
?>
