<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Suhu AC</title>
</head>
<body>
    <h2>Input Suhu AC</h2>
    <form method="post">
        <label for="suhu">Masukkan suhu (11-35 derajat celcius): </label>
        <input type="number" id="suhu" name="suhu" required min="11" max="35">
        <button type="submit">Cek Suhu</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil input suhu dari form
        $suhu = (int) $_POST["suhu"];
        $kelembaban = "";
        $bekerja_ac = "";

        // Cek rentang suhu dan tentukan kelembaban
        if ($suhu > 31 && $suhu <= 35) {
            $kelembaban = "sangat tinggi";
            $bekerja_ac = "sangat rendah";
        } elseif ($suhu > 26 && $suhu <= 30) {
            $kelembaban = "tinggi";
            $bekerja_ac = "rendah";
        } elseif ($suhu > 21 && $suhu <= 25) {
            $kelembaban = "sedang";
            $bekerja_ac = "sedang";
        } elseif ($suhu > 16 && $suhu <= 20) {
            $kelembaban = "rendah";
            $bekerja_ac = "tinggi";
        } elseif ($suhu > 11 && $suhu <= 15) {
            $kelembaban = "sangat rendah";
            $bekerja_ac = "sangat tinggi";
        } else {
            // Jika suhu tidak berada dalam interval yang diizinkan
            echo "<p>Input suhu hanya memiliki interval 11-35 derajat celcius.</p>";
            exit();
        }

        // Tampilkan hasil
        echo "<h3>Hasil</h3>";
        echo "<p>Suhu: $suhu °C</p>";
        echo "<p>Kelembaban: $kelembaban</p>";
        echo "<p>Bekerja AC: $bekerja_ac</p>";
    }
    ?>
</body>
</html>
