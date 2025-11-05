<!DOCTYPE html>
<html>
<head>
    <title>Form Validasi (AJAX + Password)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style> .error { color: red; } .success { color: green; } </style>
</head>
<body>
    <h1>Form Validasi (AJAX + Password)</h1>
    <div id="form-message"></div>
    <form id="myForm" method="post">
        <label for="nama">Nama: </label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" class="error"></span><br>
        
        <label for="email">Email: </label>
        <input type="text" id="email" name="email">
        <span id="email-error" class="error"></span><br>

        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
        <span id="password-error" class="error"></span><br>
        
        <input type="submit" value="Submit">
    </form>
    
    <script>
    $(document).ready(function() {
        $("#myForm").submit(function(event) {
            event.preventDefault(); 
            var formData = $(this).serialize();
            
            // Validasi Sisi Klien (jQuery)
            var valid = true;
            $(".error").text(""); // Bersihkan error lama
            
            var password = $("#password").val();
            if (password.length > 0 && password.length < 8) {
                $("#password-error").text("Pass min 8 karakter (Cek Klien)");
                valid = false;
            }
            if (password === "") {
                 $("#password-error").text("Password harus diisi (Cek Klien)");
                valid = false;
            }
            // (Tambahkan validasi nama & email klien jika perlu)

            // Hanya kirim AJAX jika validasi klien dasar lolos
            if (valid) {
                $.ajax({
                    type: "POST",
                    url: "proses_validasi_lengkap.php", // Handler PHP baru
                    data: formData,
                    dataType: "json", 
                    success: function(response) {
                        $(".error").text("");
                        $("#form-message").text("");

                        if (response.success) {
                            $("#form-message").attr('class', 'success').text(response.message);
                            $("#myForm")[0].reset(); 
                        } else {
                            $("#form-message").attr('class', 'error').text("Validasi server gagal.");
                            if (response.errors.nama) {
                                $("#nama-error").text(response.errors.nama);
                            }
                            if (response.errors.email) {
                                $("#email-error").text(response.errors.email);
                            }
                            if (response.errors.password) {
                                $("#password-error").text(response.errors.password);
                            }
                        }
                    }
                });
            }
        });
    });
    </script>
</body>
</html>