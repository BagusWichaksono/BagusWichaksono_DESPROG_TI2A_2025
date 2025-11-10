<?php
$menu = [
    ["nama" => "Beranda"],
    ["nama" => "Berita", "subMenu" => [
        ["nama" => "Wisata", "subMenu" => [
            ["nama" => "Pantai"],
            ["nama" => "Gunung"]
        ]],
        ["nama" => "Kuliner"],
        ["nama" => "Hiburan"]
    ]],
    ["nama" => "Tentang"],
    ["nama" => "Kontak"],
];

function tampilkanMenuBertingkat(array $menu) {
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li>{$item['nama']}";
        // Periksa apakah ada subMenu di dalam item ini
        if (isset($item['subMenu'])) {
            // Jika ada, panggil fungsi ini lagi (rekursif) dengan subMenu sebagai argumen
            tampilkanMenuBertingkat($item['subMenu']);
        }
        echo "</li>";
    }
    echo "</ul>";
}

tampilkanMenuBertingkat($menu);
?>