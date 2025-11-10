<!DOCTYPE html>
<html>
<head>
    <title>Form Validasi (AJAX)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style> .error { color: red; } .success { color: green; } </style>
</head>
<body>
    <h1>Form Validasi (AJAX)</h1>
    <div id="form-message"></div>
    <form id="myForm" method="post">
        <label for="nama">Nama: </label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" class="error"></span><br>
        
        <label for="email">Email: </label>
        <input type="text" id="email" name="email">
        <span id="email-error" class="error"></span><br>
        
        <input type="submit" value="Submit">
    </form>
    
    <script>
    $(document).ready(function() {
        $("#myForm").submit(function(event) {
            event.preventDefault(); // Selalu cegah submit default
            var formData = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "proses_validasi_ajax.php", // File handler PHP
                data: formData,
                dataType: "json", // Harapkan respons JSON
                success: function(response) {
                    // Bersihkan error lama
                    $(".error").text("");
                    $("#form-message").text("");

                    if (response.success) {
                        $("#form-message").attr('class', 'success').text(response.message);
                        $("#myForm")[0].reset(); // Kosongkan form
                    } else {
                        $("#form-message").attr('class', 'error').text("Validasi gagal.");
                        if (response.errors.nama) {
                            $("#nama-error").text(response.errors.nama);
                        }
                        if (response.errors.email) {
                            $("#email-error").text(response.errors.email);
                        }
                    }
                }
            });
        });
    });
    </script>
</body>
</html>