<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h2>Array Terindeks dengan Perulangan</h2>
<?php
    $Listdosen = ["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

    // Menggunakan perulangan for
    echo "Menggunakan for:<br>";
    for ($i = 0; $i < count($Listdosen); $i++) {
        echo $Listdosen[$i] . "<br>";
    }

    echo "<hr>";

    // Menggunakan perulangan foreach
    echo "Menggunakan foreach:<br>";
    foreach ($Listdosen as $dosen) {
        echo $dosen . "<br>";
    }
?>
</body>
</html>