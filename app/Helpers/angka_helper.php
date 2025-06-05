<?php

if (!function_exists('bulatkan')) {
    /**
     * Fungsi untuk membulatkan angka
     * 
     * @param float $angka Angka yang akan dibulatkan
     * @param int $desimal Jumlah digit desimal (default: 0)
     * @param string $mode Mode pembulatan (default: 'normal')
     *        Options: 'normal', 'up', 'down', 'banker'
     * @return float|int Angka yang sudah dibulatkan
     */
    function bulatkan(float $angka, int $desimal = 0, string $mode = 'normal')
    {
        switch ($mode) {
            case 'up':
                // Pembulatan ke atas (ceil)
                $multiplier = pow(10, $desimal);
                return ceil($angka * $multiplier) / $multiplier;

            case 'down':
                // Pembulatan ke bawah (floor)
                $multiplier = pow(10, $desimal);
                return floor($angka * $multiplier) / $multiplier;

            case 'banker':
                // Pembulatan banker's rounding (round half to even)
                return round($angka, $desimal, PHP_ROUND_HALF_EVEN);

            case 'normal':
            default:
                // Pembulatan normal (round half up)
                return round($angka, $desimal);
        }
    }
}

if (!function_exists('bulatkan_rupiah')) {
    /**
     * Fungsi khusus untuk membulatkan nilai Rupiah
     * 
     * @param float $angka Nilai uang dalam Rupiah
     * @return float Nilai yang sudah dibulatkan ke ratusan
     */
    function bulatkan_rupiah(float $angka)
    {
        // Dibulatkan ke ratusan terdekat
        return round($angka / 1000) * 1000;
    }
}
