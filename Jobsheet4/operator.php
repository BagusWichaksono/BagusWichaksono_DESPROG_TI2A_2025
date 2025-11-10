<?php
$a = 10;
$b = 5;

echo "--- Operator Aritmatika ---<br>";
$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;
echo "Tambah: $a + $b = $hasilTambah <br>";
echo "Kurang: $a - $b = $hasilKurang <br>";
echo "Kali: $a * $b = $hasilKali <br>";
echo "Bagi: $a / $b = $hasilBagi <br>";
echo "Sisa Bagi: $a % $b = $sisaBagi <br>";
echo "Pangkat: $a ** $b = $pangkat <br>";
echo "<hr>";

echo "--- Operator Pembanding ---<br>";
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "$a == $b : "; var_dump($hasilSama); echo "<br>";
echo "$a != $b : "; var_dump($hasilTidakSama); echo "<br>";
echo "$a < $b : "; var_dump($hasilLebihKecil); echo "<br>";
echo "$a > $b : "; var_dump($hasilLebihBesar); echo "<br>";
echo "$a <= $b : "; var_dump($hasilLebihKecilSama); echo "<br>";
echo "$a >= $b : "; var_dump($hasilLebihBesarSama); echo "<br>";
echo "<hr>";

echo "--- Operator Logika ---<br>";
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "$a && $b : "; var_dump($hasilAnd); echo "<br>";
echo "$a || $b : "; var_dump($hasilOr); echo "<br>";
echo "!$a : "; var_dump($hasilNotA); echo "<br>";
echo "!$b : "; var_dump($hasilNotB); echo "<br>";
echo "<hr>";

echo "--- Operator Penugasan ---<br>";
$a = 10;
$a += $b; echo "Setelah a += b, a = $a <br>";
$a -= $b; echo "Setelah a -= b, a = $a <br>";
$a *= $b; echo "Setelah a *= b, a = $a <br>";
$a /= $b; echo "Setelah a /= b, a = $a <br>";
$a %= $b; echo "Setelah a %= b, a = $a <br>";
echo "<hr>";

echo "--- Operator Identik ---<br>";
$a = 10;
$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "$a === $b : "; var_dump($hasilIdentik); echo "<br>";
echo "$a !== $b : "; var_dump($hasilTidakIdentik); echo "<br>";
echo "<hr>";
?>