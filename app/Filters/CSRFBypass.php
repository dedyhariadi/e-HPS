<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CSRFBypass implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Untuk mem-bypass CSRF, Anda bisa mengosongkan nilai POST/PUT/PATCH token CSRF
        // Atau, lebih baik, tidak menerapkannya sama sekali pada rute ini.
        // Secara default, jika filter security tidak diterapkan, maka CSRF tidak akan diperiksa.
        // Filter ini hanya sebagai penanda untuk Anda bahwa rute ini melewati CSRF.

        // *PENTING*: Filter ini TIDAK SECARA AKTIF MEMATIKAN CSRF.
        // Melainkan, ini adalah filter KOSONG yang bisa Anda terapkan pada rute
        // yang tidak menggunakan filter 'security' bawaan CodeIgniter.
        // Dengan kata lain, jika Anda ingin suatu rute tidak memeriksa CSRF,
        // CUKUP JANGAN TERAPKAN FILTER 'security' pada rute tersebut.

        // Namun, jika Anda memiliki filter global 'security' dan ingin mengecualikan,
        // Anda perlu sedikit trik yang lebih kompleks atau gunakan kondisi di dalam filter 'security' itu sendiri.
        // Cara yang lebih mudah adalah dengan mengontrol rute yang menerapkan filter 'security'.
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
