<?php
header('Content-Type: application/json');

$errors = [];
$data = [];

$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

// Validasi Nama
if (empty($nama)) {
    $errors['nama'] = "Nama harus diisi.";
}

// Validasi Email
if (empty($email)) {
    $errors['email'] = "Email harus diisi.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Format email tidak valid.";
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = "Data berhasil dikirim: Nama: $nama, Email: $email";
}

echo json_encode($data);
?>