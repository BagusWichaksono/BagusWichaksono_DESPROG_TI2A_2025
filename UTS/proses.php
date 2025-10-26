<?php
session_start();

// buat array riwayat kalo belum ada
if (!isset($_SESSION['daftar_pesanan'])) {
    $_SESSION['daftar_pesanan'] = [];
}

$daftar_tiket = [
    "Reguler Jatim Park 1" => 100000,
    "Paket JTP 1 + Museum Tubuh" => 130000,
    "Paket JTP 1 + Museum Angkut" => 170000
];

// cek kalo data dikirim pake post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- LOGIKA HAPUS ---
    // cek apakah ini request untuk 'hapus'
    if (isset($_POST['index_to_delete'])) {
        
        // (logika hapus)
        $index = $_POST['index_to_delete'];
        if (isset($_SESSION['daftar_pesanan'][$index])) {
            unset($_SESSION['daftar_pesanan'][$index]);
            echo "sukses";
        } else {
            echo "error: index tidak ditemukan";
        }
        exit();

    // --- LOGIKA TAMBAH PESANAN ---
    // cek apakah ini request untuk 'tambah'
    } else if (isset($_POST['nama'])  ) {
    
        // (logika ambil data)
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tiket = $_POST['tiket'];
        $jumlah = (int)$_POST['jumlah'];

        // (logika hitung harga)
        $harga_tiket = 0;
        if (array_key_exists($tiket, $daftar_tiket)) {
            $harga_tiket = $daftar_tiket[$tiket];
        }
        $total_harga = $harga_tiket * $jumlah;

        // membuat data baru, lalu diinsert ke array session
        $pesanan_baru = [
            'nama' => $nama,
            'email' => $email,
            'tiket' => $tiket,
            'jumlah' => $jumlah,
            'total_harga' => $total_harga
        ];
        $_SESSION['daftar_pesanan'][] = $pesanan_baru;

        // --- respon buat ajax ---
        echo "<div class='hasil-container'>";
        echo "<h2>Pesanan Sukses!</h2>";
        echo "<p>Terima kasih, Pesanan Anda telah kami terima.</p>";
        
        // (tampilin detail pesanan)
        echo "<div class='detail-pesanan'>";
        echo "<strong> Nama Pemesan :</strong> " . $nama . "<br>";
        echo "<strong> Email:</strong> " . $email . "<br>";
        echo "<strong> Tiket:</strong> " . $tiket . "<br>";
        echo "<strong> Jumlah Tiket :</strong> " . $jumlah . " tiket<br>";
        echo "<strong> Total harga:</strong> Rp " . number_format($total_harga, 0, ',', '.');
        echo "</div>";

        // (tampilin riwayat)
        if (count($_SESSION['daftar_pesanan']) > 0) {
            echo "<h3>Riwayat Transaksi Anda:</h3>";
            echo "<ul>";
            foreach (array_reverse($_SESSION['daftar_pesanan'], true) as $index => $pesanan) {
                echo "<li>";
                echo "<div class='info-pesanan'>";
                echo "<span><strong>" . $pesanan['nama'] . "</strong> - " . $pesanan['tiket'] . " (" . $pesanan['jumlah'] . " tiket)</span>";
                echo "<span class='price-text'>Rp " . number_format($pesanan['total_harga'], 0, ',', '.') . "</span>";
                echo "</div>";
                echo "<div class='aksi-pesanan'>";
                echo "<a href='#' class='tombol-hapus' data-index='" . $index . "'>&times;</a>";
                echo "</div>";
                echo "</li>";
            }
            echo "</ul>";
        }
        
        // menambahkan link kembali di dalam echo, sebelum div ditutup
        echo "<a href='index.html' class='link-kembali'>Tambah Tiket Baru</a>";

        echo "</div>"; 
    }
    
} else {
    header("location: index.html");
    exit();
}
?>