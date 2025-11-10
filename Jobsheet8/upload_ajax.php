<?php
// Ganti validasi ke gambar
$extensions = array("jpg", "jpeg", "png", "gif");
$maxsize = 5 * 1024 * 1024; // 5 MB
$targetDirectory = "uploads/";

if (isset($_FILES['files']['name'][0]) && !empty($_FILES['files']['name'][0])) {
    $totalFiles = count($_FILES['files']['name']);
    $all_responses = "";

    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        @$file_ext = strtolower(end(explode('.', $file_name)));

        $errors = array();

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "Ekstensi file ($file_name) tidak diizinkan.";
        }
        if ($file_size > $maxsize) {
            $errors[] = "Ukuran file ($file_name) tidak boleh lebih dari 5 MB.";
        }

        if (empty($errors)) {
            if(move_uploaded_file($file_tmp, $targetDirectory . $file_name)){
                $all_responses .= "File $file_name berhasil diunggah.<br>";
            } else {
                $all_responses .= "Gagal mengunggah $file_name.<br>";
            }
        } else {
            $all_responses .= implode(" ", $errors) . "<br>";
        }
    }
    echo $all_responses; // Echo semua hasil di akhir
} else {
    echo "Tidak ada file yang diunggah.";
}
?>