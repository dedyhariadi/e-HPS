<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* @font-face {
            font-family: 'Arial';
            src: url('Arial.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        } */

        @page {
            margin-top: 2.03cm;
            margin-bottom: 1.27cm;
            margin-left: 2.54cm;
            margin-right: 1.52cm;
        }

        body {
            /* font-family: 'Arial', sans-serif; */
            font-size: 12pt;
            line-height: 1.1;
        }

        .solid-line {
            border-top: 1px solid #000;
            margin: 0px 0;
            margin-top: 0px;
            width: 57%;
        }

        .custom-underline {
            display: inline-block;
            /* Penting agar padding-bottom berfungsi */
            border-bottom: 1px solid black;
            /* Ini adalah garis bawah Anda */
            padding-bottom: 5px;
            /* text-indent: 85px; */
            /* width: 50%; */
            /* Ini menggeser garis bawah ke bawah */
            /* Anda bisa sesuaikan warna, gaya (dashed, dotted), dan ketebalan border */
            /* border: 1px solid black; */
        }

        .container-float {
            width: 100%;
            overflow: hidden;
            /* Clearfix */
        }

        .kiri-float {
            float: left;
            width: 10px;
            /* border: 1px solid black; */
        }
    </style>
</head>

<body>
    <span style="display:block;text-indent : 50px;">
        MARKAS BESAR ANGKATAN LAUT <br>
    </span>
    <div class="custom-underline">
        DINAS MATERIEL SENJATA DAN ELEKTRONIKA
    </div>
    <div style="text-align: right;">Jakarta, 30 April 2025</div>
    <div class="container-float">
        Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: R/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/IV/2024 <br>
        Klasifikasi : Rahasia<br>
        Lampiran&nbsp;&nbsp;: Sepuluh Lembar<br>
        Perihal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Dukungan Harga Perkiraan Sendiri <br>
        <span style="display: block; text-indent: 85px;">Pemeliharaan Amunisi Tidak Layak</span>
        <span style="display: inline-block; width: 80px; text-align: left;"></span>
        <span class="custom-underline" style="line-height: 1.5;">Pakai dengan Pengecoran Arsenal</span>
    </div>


    <div style="text-indent: 78%;">Kepada </div><br>
    <div style="text-indent: 70%;">Yth. &nbsp;&nbsp;&nbsp; Pejabat Pengadaan</div><br>
    <div style="text-indent: 78%;">di</div><br>
    <div style="text-indent: 78%;">Jakarta</div>

    <br><br>

    <p style="text-align: justify;">
        1. &nbsp;&nbsp;&nbsp;Berdasarkan Surat Pejabat Pengadaan Barang/Jasa Dissenlekal Nomor B/782/IV/2024/Dissenlekal tanggal 29 April 2024 tentang Permohonan Dukungan Harga Perkiraan Sendiri (HPS) dan Spesifikasi Teknis Pemeliharaan Amunisi Tidak Layak Pakai dengan Pengecoran Arsenal.
    </p>

    <p style="text-align: justify;">
        2. &nbsp;&nbsp;&nbsp;Sehubungan dasar tersebut, dikirimkan data Harga Perkiraan Sendiri (HPS) dan Spesifikasi Teknis Pemeliharaan Amunisi Tidak Layak Pakai dengan Pengecoran Arsenal, senilai Rp 199.981.000,00 (seratus sembilan puluh sembilan juta sembilan ratus delapan puluh satu ribu rupiah) sesuai lampiran.
    </p>

    <p style="text-align: justify;">
        3. &nbsp;&nbsp;&nbsp;Untuk menjadi perhatian dan pelaksanaan.
    </p>
    <br><br>
    <div style="text-align: center; text-indent: 50%;"> a.n. Kepala Dissenlekal</div>
    <div style="text-align: center; text-indent: 50%;"> Sekdis</div>
    <div style="text-align: center; text-indent: 50%;"> Selaku</div>
    <div style="text-align: center; text-indent: 50%;"> PPK,</div>
    <br><br><br><br>

    <span style="display: inline-block; width: 49%; text-align: left;">Tembusan :</span>
    <span style="display: inline-block;  width: 49%;text-align:center ; text-indent:1%; ">Eddy Saputra, S.T., M.A.P.</span>

    <div style="text-align: center; text-indent: 50%;"> Kolonel Laut (E) NRP 13367/P</div>

    <p class="custom-underline">
        Kadissenlekal selaku KPA
    </p>


    <!-- <img src="data:image/png;base64'.base64_encode(file_get_contents('/assets/images/garis.png')).'" alt=""> -->

    <!-- <img src="data:image/png;base64,' . base64_encode(file_get_contents('/assets/images/garis.png')) . '" alt="" class="gambar" /> -->




    <?php
    // cara menyisipkan gambar
    // $imagePath = FCPATH . 'assets/images/pema.jpg'; // Path to your image file
    // $imageData = base64_encode(file_get_contents($imagePath));
    // $imageSrc = 'data:image/jpg;charset=utf-8;base64,' . $imageData;
    // cetak $imageSrc
    // <?= $imageSrc; 
    ?>

    <!-- <img src="" style="width: 500px;" alt="Logo"> -->



</body>

</html>