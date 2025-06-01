<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'Arial';
            src: url('Arial.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @page {
            margin-top: 2.03cm;
            margin-bottom: 1.27cm;
            margin-left: 2.54cm;
            margin-right: 1.52cm;
        }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 12pt;
            line-height: 1;
        }

        .solid-line {
            border-top: 2px solid #000;
            margin: 0px 0;
            margin-top: 0px;
            width: 57%;
        }

        .dashed-line {
            border-top: 1px dashed #666;
            margin: 10px 0;
        }

        .vertical-line {
            border-left: 1px solid #000;
            height: 50px;
            display: inline-block;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <p style="text-indent: 50px;">
        MARKAS BESAR ANGKATAN LAUT <br>
        DINAS MATERIEL SENJATA DAN ELEKTRONIKA<br>
    </p>
    <div class="solid-line">
    </div>
    <div style="text-align: right;">Jakarta, 30 April 2025</div>
    <p>
        Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: R/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/IV/2024 <br>
        Klasifikasi : Rahasia<br>
        Lampiran&nbsp;&nbsp;: Sepuluh Lembar<br>
        Perihal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Dukungan Harga Perkiraan Sendiri <br>
        <span style="display: block; text-indent: 85px;">Pemeliharaan Amunisi Tidak Layak</span>
        <span style="display: block; text-indent: 85px;">Pakai dengan Pengecoran Arsenal</span>
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