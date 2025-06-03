<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kegiatan</title>
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
            font-size: 11pt;
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
    <div style="text-align: right;">Jakarta, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $bulan[intval(date('m', strtotime($kegiatan['tglSurat']))) - 1] . " " . date('Y', strtotime($kegiatan['tglSurat'])); ?></div>
    <div class="container-float">
        Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: R/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/<?= number_to_roman(intval(date('m', strtotime($kegiatan['tglSurat'])))); ?>/<?= date('Y', strtotime($dasar['tglSurat'])); ?> <br>
        Klasifikasi : Rahasia<br>
        Lampiran&nbsp;&nbsp;: Sepuluh Lembar<br>
        Perihal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Dukungan Harga Perkiraan Sendiri <br>
        <span style="display: block; text-indent: 78px;">Pemeliharaan Amunisi Tidak Layak</span>
        <span style="display: inline-block; width: 74px; text-align: left;"></span>
        <span class="custom-underline" style="line-height: 1.5;">Pakai dengan Pengecoran Arsenal</span>
    </div>


    <div style="text-indent: 78%;">Kepada </div><br>
    <div style="text-indent: 70%;">Yth. &nbsp;&nbsp;&nbsp; Pejabat Pengadaan</div><br>
    <div style="text-indent: 78%;">di</div><br>
    <div style="text-indent: 78%;">Jakarta</div>

    <br><br>

    <div style="text-align: justify;">
        1. &nbsp;&nbsp;&nbsp;Berdasarkan Surat Pejabat Pengadaan Barang/Jasa Dissenlekal Nomor B/782/IV/2024/Dissenlekal tanggal 29 April 2024 tentang Permohonan Dukungan Harga Perkiraan Sendiri (HPS) dan Spesifikasi Teknis Pemeliharaan Amunisi Tidak Layak Pakai dengan Pengecoran Arsenal.
    </div>
    <br>
    <div style="display:inline-block;text-align: justify;">
        2. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dasar tersebut, dikirimkan data Harga Perkiraan Sendiri (HPS) dan Spesifikasi Teknis Pemeliharaan Amunisi Tidak Layak Pakai dengan Pengecoran Arsenal, senilai Rp 199.981.000,00 (seratus sembilan puluh sembilan juta sembilan ratus delapan puluh satu ribu rupiah) sesuai lampiran.
    </div>
    <br><br>
    <p style="text-align: justify;">
        3. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk menjadi perhatian dan pelaksanaan.
    </p>
    <br><br>
    <div style="text-align: center; text-indent: 50%;"> a.n. Kepala Dissenlekal</div>
    <div style="text-align: center; text-indent: 50%;"> Sekdis</div>
    <div style="text-align: center; text-indent: 50%;"> Selaku</div>
    <div style="text-align: center; text-indent: 50%;"> PPK,</div>
    <br><br><br><br>

    <span style="display: inline-block; width: 49%; text-align: left;">Tembusan :</span>
    <span style="display: inline-block;  width: 49%;text-align:center ; text-indent:1%; ">Eddy Saputra, S.T., M.A.P.</span>

    <div>
        <span style="display:block; text-align: center; text-indent: 50%;">Kolonel Laut (E) NRP 13367/P </span><br>
        <span class="custom-underline" style="text-align: left;">Kadissenlekal selaku KPA</span>

    </div>

    <div style="page-break-after: always;"></div>

    <span style="display: inline-block; width: 50%; text-align: left; text-indent:50px;">MARKAS BESAR ANGKATAN LAUT</span>
    <span style="display: inline-block;  width: 49%;text-align:right; ">Lampiran I Surat Kadissenlekal</span>


    <span style="display: inline-block; width: 52.4%; text-align: left;" class="custom-underline">
        DINAS MATERIEL SENJATA DAN ELEKTRONIKA
    </span>
    <span style="display: inline-block;  width: 46.5%;text-align:right; ">Nomor R/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/IV/2024</span>


    <span style="display: inline-block; width: 430px; text-align: left;"></span>
    <span class="custom-underline" style="line-height: 1.5;">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;April 2024</span>

    <br><br>
    <div style="text-align: center;">
        HARGA PERKIRAAN SENDIRI (HPS) <br>
        PEMELIHARAAN AMUNISI TIDAK LAYAK PAKAI DENGAN PENGECORAN ARSENAL
    </div>
    <br><br>
    <table style="text-align:justify;margin: left -5px;">
        <tr>
            <td style="width: 30px;">1. </td>
            <td>Total HPS = Rp 199.981.000,00</td>
        </tr>
        <tr>
            <td style="width: 30px;">2. </td>
            <td>Referensi :</td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td>a.&nbsp;&nbsp;&nbsp;Peraturan Presiden RI Nomor 16 Tahun 2018 tentang penyusunan HPS telah memperhitungkan keuntungan dan biaya tidak langsung (<i>overhead cost</i>);</td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td>b.&nbsp;&nbsp;&nbsp;Surat Edaran Kadissenlekal nomor SE/237/IV/2021 tanggal 19 April 2021 tentang Format Penyusun HPS Satker Dissenlekal;</td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td>c.&nbsp;&nbsp;&nbsp;Data harga dari situs jual beli online di Indonesia (Tokopedia, Bukalapak, Monotaro, Shopee, Blibli, dan beberapa situs lainnya);</td>
        </tr>
        <?php
        $char = "d";
        $banyakHuruf = 1;
        $cetakHuruf = "";
        for ($a = 1; $a < 60; $a++) {
        ?>
            <tr>
                <td style="width: 30px;"></td>
                <td>
                    <?php
                    for ($huruf = 1; $huruf <= $banyakHuruf; $huruf++) {
                        echo $char;
                    }

                    if ($char == "z") {
                        $banyakHuruf++;
                        $char = "a";
                    } else {
                        $char++;
                    };


                    ?>.&nbsp;&nbsp;&nbsp;Data harga dari situs jual beli online di Indonesia (Tokopedia, Bukalapak, Monotaro, Shopee, Blibli, dan beberapa situs lainnya);</td>
            </tr>
        <?php
        }
        ?>
        <br>
        <tr>
            <td colspan="2">3. &nbsp;&nbsp;&nbsp;&nbsp;Analisa Harga.&nbsp;&nbsp;&nbsp;Dari referensi tersebut diatas dapat diperhitungkan bahwa jumlah anggaran Pemeliharaan Amunisi Tidak Layak Pakai dengan Pengecoran Arsenal tahun 2024 adalah sebagai berikut : <br><br></td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td>a. &nbsp;&nbsp;&nbsp; Biaya kebutuhan material pengecoran projectile:</td>
        </tr>
    </table>


    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: center; margin-top: 10px;">
        <thead>
            <tr>
                <th style="width: 10px;">No</th>
                <th style="width: 150px;">Materiel</th>
                <th style="width: 20px;">Harga Satuan 1</th>
                <th>Harga Satuan 2</th>
                <th>Rata-rata Harga Satuan</th>
                <th>Kebutuhan</th>
                <th>Jumlah Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Projectile 105 mm</td>
                <td>1.000.000</td>
                <td>1.200.000</td>
                <td>1.100.000</td>
                <td>10</td>
                <td>11.000.000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Projectile 155 mm</td>
                <td>1.500.000</td>
                <td>1.800.000</td>
                <td>1.650.000</td>
                <td>5</td>
                <td>8.250.000</td>

            <tr style="text-align: right;">
                <td colspan="6"> Total Jumlah Harga</td>
                <td>21.500.000</td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> Over head cost dan keuntungan 15%</td>
                <td>1.500.000</td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> Total Jumlah Harga</td>
                <td>21.500.000</td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> PPN</td>
                <td>21.500.000</td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> Total Jumlah Harga</td>
                <td>21.500.000</td>
            </tr>
    </table>
    <br>
    <table>
        <tr>
            <td style="width: 30px;"></td>
            <td>b. &nbsp;&nbsp;&nbsp; Biaya kebutuhan materiel pendukung:</td>
        </tr>
    </table>
    <br>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: center; margin-top: 10px;">
        <thead>
            <tr>
                <th style="width: 10px;">No</th>
                <th style="width: 150px;">Materiel</th>
                <th style="width: 20px;">Harga Satuan 1</th>
                <th>Harga Satuan 2</th>
                <th>Rata-rata Harga Satuan</th>
                <th>Kebutuhan</th>
                <th>Jumlah Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Projectile 105 mm</td>
                <td>1.000.000</td>
                <td>1.200.000</td>
                <td>1.100.000</td>
                <td>10</td>
                <td>11.000.000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Projectile 155 mm</td>
                <td>1.500.000</td>
                <td>1.800.000</td>
                <td>1.650.000</td>
                <td>5</td>
                <td>8.250.000</td>

            <tr style="text-align: right;">
                <td colspan="6"> Total Jumlah Harga</td>
                <td>21.500.000</td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> Over head cost dan keuntungan 15%</td>
                <td>1.500.000</td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> Total Jumlah Harga</td>
                <td>21.500.000</td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> PPN</td>
                <td>21.500.000</td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> Total Jumlah Harga</td>
                <td>21.500.000</td>
            </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td style="width: 30px;"></td>
            <td>c. &nbsp;&nbsp;&nbsp; Jasa pengecoran:</td>
        </tr>
    </table>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: center; margin-top: 10px;">
        <thead>
            <tr>
                <th style="width: 10px;">No</th>
                <th style="width: 150px;">Uraian Kegiatan</th>
                <th style="width: 20px;">Harga</th>
                <th>Inflasi dari tahun 2021 s.d. 2024</th>
                <th>Jumlah</th>
                <th>Jumlah orang</th>
                <th>Jam</th>
                <th>Hari</th>
                <th>Jumlah Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td style="text-align: left;">Pengecoran</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: left;">- Tenaga Ahli</td>
                <td>166.236</td>
                <td>3.55%</td>
                <td>172.138</td>
                <td>1</td>
                <td>5</td>
                <td>5</td>
                <td>4.303.445</td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: left;">- Tenaga Pelaksana</td>
                <td>80.809</td>
                <td>3.55%</td>
                <td>83.678</td>
                <td>4</td>
                <td>5</td>
                <td>15</td>
                <td>25.103.316</td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="8">Jumlah</td>
                <td>29.406.761</td>
            </tr>
    </table>
    <br><br>
    <table style="width: 100%;">
        <tr>
            <td style="width: 30px;"></td>
            <td colspan="2">d. &nbsp;&nbsp;&nbsp; Total biaya keseluruhan adalah:</td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td style="width: 30px;"></td>
            <td>= Point a + Point b + Point c</td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td style="width: 30px;"></td>
            <td>= Rp 161.949.813,49 + Rp 8.625.099,88 + Rp 29.406.761</td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td style="width: 30px;"></td>
            <td>= Rp 199.981.675</td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td style="width: 30px;"></td>
            <td>= Rp 199.981.000 (pembulatan)</td>
        </tr>
    </table>
    <br><br>

    <table style="text-align:justify;margin: left -5px;">
        <!-- <tr>
            <td style="width: 30px;">. </td>
            <td>Total HPS = Rp 199.981.000,00</td>
        </tr> -->
        <tr>
            <td colspan="2">4. &nbsp;&nbsp;&nbsp;&nbsp;Kesimpulan.&nbsp;&nbsp;&nbsp;Dari analisa harga di atas, diperoleh HPS yang dapat dijadikan sebagai acuan dalam penentuan biaya Pemeliharaan Amunisi Tidak Layak Pakai dengan pengecoran Arsenal adalah Rp 199.981.000,00 (seratus sembilan puluh sembilan juta sembilan ratus delapan puluh satu ribu rupiah). <br><br></td>
        </tr>
    </table>

    <div style="text-align: center; text-indent: 50%;"> a.n. Kepala Dissenlekal</div>
    <div style="text-align: center; text-indent: 50%;"> Sekdis</div>
    <div style="text-align: center; text-indent: 50%;"> Selaku</div>
    <div style="text-align: center; text-indent: 50%;"> PPK,</div>
    <br><br><br><br>
    <div style="text-align: center; text-indent: 50%;"> Eddy Saputra, S.T., M.A.P.</div>
    <div style="text-align: center; text-indent: 50%;"> Kolonel Laut (E) NRP 13367/P</div>


    <div style="page-break-after: always;"></div>
    <!-- Lampiran II  -->

    <span style="display: inline-block; width: 50%; text-align: left; text-indent:50px;">MARKAS BESAR ANGKATAN LAUT</span>
    <span style="display: inline-block;  width: 49%;text-align:right; ">Lampiran II Surat Kadissenlekal</span>


    <span style="display: inline-block; width: 52.4%; text-align: left;" class="custom-underline">
        DINAS MATERIEL SENJATA DAN ELEKTRONIKA
    </span>
    <span style="display: inline-block;  width: 46.5%;text-align:right; ">Nomor R/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/IV/2024</span>


    <span style="display: inline-block; width: 430px; text-align: left;"></span>
    <span class="custom-underline" style="line-height: 1.5;">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;April 2024</span>

    <br><br>
    <div style="text-align: center;">
        SPESIFIKASI TEKNIS<br>
        PEMELIHARAAN AMUNISI TIDAK LAYAK PAKAI DENGAN PENGECORAN ARSENAL
    </div>
    <br>

    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: center; margin-top: 10px;">
        <thead>
            <th>NO</th>
            <th>SPESIFIKASI TEKNIS/URAIAN PEKERJAAN</th>
            <th>JUMLAH/SAT</th>
        </thead>
        <tbody>
            <tr style="font-weight: bold;">
                <td style="width: 30px;">A.</td>
                <td style="text-align: left; ">Kebutuhan materiel pengecoran</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 30px;">1</td>
                <td style="text-align: left;">Keranjang</td>
                <td>5 buah</td>
            </tr>
            <tr>
                <td style="width: 30px;">2</td>
                <td style="text-align: left;">Kawat</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <td style="width: 30px;">3</td>
                <td style="text-align: left;">Bahan bakar</td>
                <td>5 liter</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold;">
                <td style="width: 30px;">B.</td>
                <td style="text-align: left; ">Kebutuhan materiel pendukung</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 30px;">1</td>
                <td style="text-align: left;">Keranjang</td>
                <td>5 buah</td>
            </tr>
            <tr>
                <td style="width: 30px;">2</td>
                <td style="text-align: left;">Kawat</td>
                <td>5 kg</td>
            </tr>
            <tr>
                <td style="width: 30px;">3</td>
                <td style="text-align: left;">Bahan bakar</td>
                <td>5 liter</td>
            </tr>
        </tbody>
    </table>

    <br><br>
    <div style="text-align: center; text-indent: 50%;"> a.n. Kepala Dissenlekal</div>
    <div style="text-align: center; text-indent: 50%;"> Sekdis</div>
    <div style="text-align: center; text-indent: 50%;"> Selaku</div>
    <div style="text-align: center; text-indent: 50%;"> PPK,</div>
    <br><br><br><br>
    <div style="text-align: center; text-indent: 50%;"> Eddy Saputra, S.T., M.A.P.</div>
    <div style="text-align: center; text-indent: 50%;"> Kolonel Laut (E) NRP 13367/P</div>


    <div style="page-break-after: always;"></div>
    <!-- Lampiran II  -->

    <span style="display: inline-block; width: 50%; text-align: left; text-indent:50px;">MARKAS BESAR ANGKATAN LAUT</span>
    <span style="display: inline-block;  width: 49%;text-align:right; ">Lampiran III Surat Kadissenlekal</span>


    <span style="display: inline-block; width: 52.4%; text-align: left;" class="custom-underline">
        DINAS MATERIEL SENJATA DAN ELEKTRONIKA
    </span>
    <span style="display: inline-block;  width: 46.5%;text-align:right; ">Nomor R/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/IV/2024</span>


    <span style="display: inline-block; width: 430px; text-align: left;"></span>
    <span class="custom-underline" style="line-height: 1.5;">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;April 2024</span>

    <br><br>
    <div style="text-align: center;">
        GAMBAR
    </div>
    <br>
    <p>A. Kebutuhan Materiel Pengecoran</p>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: center; margin-top: 10px;">
        <tr>
            <?php
            // cara menyisipkan gambar
            $imagePath = FCPATH . 'assets/images/pemandangan.jpg'; // Path to your image file
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;charset=utf-8;base64,' . $imageData;
            ?>

            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
        </tr>
        <tr>
            <?php
            // cara menyisipkan gambar
            $imagePath = FCPATH . 'assets/images/semen.jpg'; // Path to your image file
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;charset=utf-8;base64,' . $imageData;
            ?>

            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
        </tr>
        <tr>
            <?php
            // cara menyisipkan gambar
            $imagePath = FCPATH . 'assets/images/pasir.jpg'; // Path to your image file
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;charset=utf-8;base64,' . $imageData;
            ?>

            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                pasir
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                pasir
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                pasir
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                pasir
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                pasir
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                pasir
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                pasir
            </td>
        </tr>
    </table>
    <br>
    <p>B. Kebutuhan Materiel Pendukung</p>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: center; margin-top: 10px;">
        <tr>
            <?php
            // cara menyisipkan gambar
            $imagePath = FCPATH . 'assets/images/pemandangan.jpg'; // Path to your image file
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;charset=utf-8;base64,' . $imageData;
            ?>

            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                Keranjang
            </td>
        </tr>
        <tr>
            <?php
            // cara menyisipkan gambar
            $imagePath = FCPATH . 'assets/images/semen.jpg'; // Path to your image file
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;charset=utf-8;base64,' . $imageData;
            ?>

            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
            <td style="width: 15%;">
                <img src="<?= $imageSrc; ?>" width="75" height="75" alt="Logo"><br>
                semen
            </td>
        </tr>
    </table>

    <br><br>
    <div style="text-align: center; text-indent: 50%;"> a.n. Kepala Dissenlekal</div>
    <div style="text-align: center; text-indent: 50%;"> Sekdis</div>
    <div style="text-align: center; text-indent: 50%;"> Selaku</div>
    <div style="text-align: center; text-indent: 50%;"> PPK,</div>
    <br><br><br><br>
    <div style="text-align: center; text-indent: 50%;"> Eddy Saputra, S.T., M.A.P.</div>
    <div style="text-align: center; text-indent: 50%;"> Kolonel Laut (E) NRP 13367/P</div>


</body>

</html>