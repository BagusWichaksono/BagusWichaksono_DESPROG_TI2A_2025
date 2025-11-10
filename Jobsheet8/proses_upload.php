<?php
$targetDirectory = "uploads/"; // Ganti ke folder uploads

if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Validasi gambar
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
$maxsize = 5 * 1024 * 1024; // 5 MB

if (isset($_FILES['files']['name'][0]) && !empty($_FILES['files']['name'][0])) {
    $totalFiles = count($_FILES['files']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $targetFile = $targetDirectory . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $fileSize = $_FILES['files']['size'][$i];

        // Tambahkan validasi di dalam loop
        if (in_array($fileType, $allowedExtensions) && $fileSize <= $maxsize) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "File $fileName tidak valid (harus .jpg, .jpeg, .png, .gif & < 5MB).<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>