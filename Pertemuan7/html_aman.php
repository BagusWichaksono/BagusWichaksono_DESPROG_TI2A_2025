<!DOCTYPE html>
<html>
<head>
    <title>HTML Injection Aman</title>
</head>
<body>
    <h2>Form Input Teks</h2>
    <form method="post" action="">
        <label for="input">Input:</label>
        <input type="text" name="input" id="input" style="width: 300px;">
        <input type="submit" value="Submit">
    </form>
    <hr>
    <h3>Hasil Input Teks:</h3>
    <div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input'])) {
        $input = $_POST['input'];
        $input_aman = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        echo $input_aman;
    }
    
    ?>
    </div>
    
    <br><hr><br>
    
    <h2>Form Input Email</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" style="width: 300px;">
        <input type="submit" value="Submit">
    </form>
    <hr>
    <h3>Hasil Validasi Email:</h3>
    <div>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email yang Anda masukkan valid: <b>" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</b>";
        } else {
            echo "<span style='color: red;'>Format email tidak valid.</span>";
        }
    }

    ?>
    </div>
</body>
</html>