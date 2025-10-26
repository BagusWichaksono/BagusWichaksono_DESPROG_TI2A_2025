$(document).ready(() => {
    
    $(".form-section").hide().fadeIn(1200);

    // fungsi tombol minus
    $(".qty-minus").on("click", (e) => {
        e.preventDefault(); // cegah aksi default tombol
        // baca nilai sekarang
        const current = Number.parseInt($("#jumlah").val());
        // kalo lebih dari 1, kurangi 1
        if (current > 1) {
            $("#jumlah").val(current - 1);
        }
    });

    // fungsi tombol plus
    $(".qty-plus").on("click", (e) => {
        e.preventDefault(); // cegah aksi default tombol
        // baca nilai sekarang
        const current = Number.parseInt($("#jumlah").val());
        // kalo kurang dari 10, tambah 1
        if (current < 10) {
            $("#jumlah").val(current + 1);
        }
    });

    // waktu form disubmit
    $("#formPemesanan").on("submit", function (event) {
        // ini penting, biar halaman tidak reload.
        // kita kirim datanya pakai ajax
        
        event.preventDefault(); 

        // anggap valid dulu
        let isValid = true;

        // --- validasi nama ---
        const nama = $("#nama").val().trim();
        if (nama === "") {
            isValid = false; // gagal validasi
            // tampilkan error
            $("#nama").next(".error-message").text("nama wajib diisi.").slideDown();
        } else {
            // sembunyikan error
            $("#nama").next(".error-message").slideUp();
        }

        // --- validasi email ---.
        const email = $("#email").val().trim();
        // regex buat format email
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (email === "") {
            isValid = false;
            $("#email").next(".error-message").text("email wajib diisi.").slideDown();
        } else if (!emailPattern.test(email)) { // cek format email
            isValid = false;
            $("#email").next(".error-message").text("format email tidak benar.").slideDown();
        } else {
            $("#email").next(".error-message").slideUp();
        }

        // --- validasi tiket ---
        const tiket = $("#tiket").val();
        if (tiket === "") {
            isValid = false;
            $("#tiket").next(".error-message").text("silakan pilih tiket.").slideDown();
        } else {
            $("#tiket").next(".error-message").slideUp();
        }

        // --- validasi jumlah ---
        const jumlah = $("#jumlah").val();
        if (jumlah === "" || Number.parseInt(jumlah) < 1) {
            isValid = false;
            $("#jumlah").next(".error-message").text("jumlah tiket minimal 1.").slideDown();
        } else {
            $("#jumlah").next(".error-message").slideUp();
        }

        // --- kirim data kalo valid ---
        if (isValid) {
            // sembunyiin form
            $(this).slideUp(500, function () {
                
                // kirim data ke php pakai ajax
                $.ajax({
                    type: "POST", // method kirim
                    url: $(this).attr("action"), // ambil url dari form (proses.php) = "proses.php"
                    data: $(this).serialize(), // ambil semua data form (nama, email, dll)
                    
                    // kalo sukses dapet balasan dari php
                    success: (response) => {
                        // 'response' itu isi 'echo' dari php
                        // masukin 'response' itu ke div #hasil-ajax
                        $("#hasil-ajax").html(response).fadeIn(1000);
                    },
                    // kalo gagal konek ke php
                    error: () => {
                        alert("terjadi kesalahan saat mengirim data.");
                        // tunjukin formnya lagi
                        $("#formPemesanan").slideDown();
                    },
                });
            });
        }
    });


    // --- FUNGSI HAPUS ---
    $("#hasil-ajax").on("click", ".tombol-hapus", function(e) {
        e.preventDefault(); // cegah link <a> pindah halaman

        // konfirmasi dulu
        if (confirm("yakin mau hapus pesanan ini?")) {
            
            const index_hapus = $(this).data("index"); // ambil index dari atribut data-index
            const li_item = $(this).closest("li"); // simpan elemen <li> yg mau dihapus

            // kirim ajax ke 'proses.php'
            $.ajax({
                type: "POST",
                url: "proses.php", // kirim ke file php yang sama
                data: { index_to_delete: index_hapus }, // data yg dikirim cuma index
                
                // kalo sukses dapet balasan dari php
                success: (response) => {
                    if (response.trim() === "sukses") {
                        // kalo sukses, hapus item <li> dari tampilan
                        li_item.fadeOut(500, function() {
                            $(this).remove();
                        });
                    } else {
                        // kalo gagal
                        alert("gagal menghapus: " + response);
                    }
                },
                // kalo gagal konek
                error: () => {
                    alert("error koneksi, tidak bisa menghapus.");
                }
            });
        }
    });

});