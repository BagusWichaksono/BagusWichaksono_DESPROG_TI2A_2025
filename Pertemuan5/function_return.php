<?php
//membuat fungsi hitung umur
function hitungUmur($thn_lahir, $thn_sekarang){
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}

//membuat fungsi perkenalan
function perkenalan($nama, $salam="Assalamualaikum"){
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    
    //memanggil fungsi lain
    echo "Saya berusia ". hitungUmur(2005, 2025) ." tahun<br/>";
    echo "Senang berkenalan dengan anda<br/>";
}

//memanggil fungsi perkenalan
perkenalan("Bagus");
?>