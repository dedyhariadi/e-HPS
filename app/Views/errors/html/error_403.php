<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak - Maaf, Anda Tidak Diizinkan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        h1 {
            color: #dc3545;
            /* Merah untuk error */
            font-size: 2.5em;
            margin-bottom: 15px;
        }

        p {
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            /* Biru untuk tombol */
            color: #ffffff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .footer-note {
            margin-top: 30px;
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Akses Ditolak (Error 403)</h1>
        <p>Maaf, Anda tidak memiliki izin untuk melakukan tindakan yang diminta.</p>
        <p>Ada kemungkinan Anda mencoba mengakses halaman yang tidak diizinkan atau sesi Anda telah berakhir.</p>
        <a href="<?= base_url(); ?>" class="button">Kembali ke Halaman Utama</a>
        <p class="footer-note">Jika Anda merasa ini adalah kesalahan, silakan hubungi administrator.</p>
    </div>
</body>

</html>