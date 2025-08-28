<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Siap</title>
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

        }

        .container-float {
            width: 100%;
            overflow: hidden;
            /* Clearfix */
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
        }

        .page-number:before {
            content: counter(page) " dari " counter(pages);
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* Penting: menempatkan item pertama ke kiri, item kedua ke kanan */
            width: 100%;
            /* Atau lebar yang Anda inginkan untuk kontainer */
            margin-top: 20px;
            /* Optional: tambahkan border untuk melihat batas container */
            /* border: 1px dashed blue; */
        }

        .line {
            flex-grow: 1;
            /* Garis akan mengambil sisa ruang yang tersedia */
            height: 2px;
            /* Tebal garis */
            background-color: #888;
            /* Warna abu-abu untuk garis */
            margin-right: 10px;
            /* Jarak antara garis dan tulisan */
        }

        .date-location {
            white-space: nowrap;
            /* Mencegah tulisan pecah baris */
        }
    </style>

</head>

<body>

    <table border="0" cellpading=0 style="line-height: 1; width:100%;border-collapse:collapse;">
        <tr>
            <?php if ($kopSurat == 'arsenal') { ?>
                <td style="width:390px;text-align: center;">
                    DINAS MATERIEL SENJATA DAN ELEKTRONIKA TNI AL
                <?php } else { ?>
                <td style="width: 335px;text-align: center;">
                    MARKAS BESAR ANGKATAN LAUT
                <?php } ?>
                </td>
                <td style="width:55px;"></td>
                <td colspan="2">

                </td>
        </tr>
        <tr>
            <?php if ($kopSurat == 'arsenal') { ?>
                <td style="width:390px; text-align: center;">
                    ARSENAL
                <?php } else { ?>
                <td style="width:335px; text-align: center;">
                    DINAS MATERIEL SENJATA DAN ELEKTRONIKA
                <?php } ?>
                </td>
                <td></td>
                <td style="width: 70px;">
                </td>
                <td style="text-align: right;">
                </td>
        </tr>
        <tr>
            <td style="padding: 0;vertical-align:middle;width:100%;">
                <div style="height:1px;background-color:#888;"></div>
            </td>
            <?php if ($kopSurat == "arsenal") { ?>
                <td style="width: 50px;"></td>
            <?php } else { ?>
                <td style="width: 113px;"></td>
            <?php } ?>
            <td style="white-space: nowrap;padding-left:0;">
                <div class="date-location">Batuporon, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $bulan[intval(date('m', strtotime($kegiatan['tglSurat']))) - 1] . " " . date('Y', strtotime($kegiatan['tglSurat'])); ?></div>
            </td>
            <td></td>
        </tr>
    </table>


    <br>

    <table border=0 style="margin: left -3px;table-layout: fixed;width:100%;">
        <tr>
            <td style="width: 12%;">
                Nomor
            </td>
            <td style="width: 1%;">
                :
            </td>
            <td style="width:40%;">
                R/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/<?= number_to_roman(intval(date('m', strtotime($kegiatan['tglSurat'])))); ?>/<?= date('Y', strtotime($kegiatan['tglSurat'])); ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                Klasifikasi
            </td>
            <td>
                :
            </td>
            <td>
                Rahasia
            </td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 100px; vertical-align: top;">Lampiran</td>
            <td>
                :
            </td>
            <td style="text-align: left;">
                <?= (isset($jumlahHalaman)) ? ucwords(trim(terbilang($jumlahHalaman - 1))) : ''; ?> Lembar
            </td>
            <td></td>
        </tr>

        <tr>
            <td style="vertical-align: top;">
                Perihal
            </td>
            <td style="vertical-align: top;">
                :
            </td>
            <td style="border-bottom: 1px solid; text-align:justify;">
                Dukungan Harga Perkiraan Sendiri <?= $kegiatan['namaKegiatan']; ?>
            </td>
            <td></td>
        </tr>
    </table>

    <!-- </div> -->


    <div style=" text-indent: 78%;">Kepada
    </div><br>
    <div style="text-indent: 70%;">Yth. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pejabat Pengadaan</div><br>
    <div style="text-indent: 78%;">di</div><br>
    <div style="text-indent: 78%;">Batuporon</div>

    <br><br>

    <div style="text-align: justify;">
        1. &nbsp;&nbsp;&nbsp;Berdasarkan Surat <?= $dasar['pejabat']; ?> Nomor <?= $dasar['noSurat']; ?> tanggal <?= date('d', strtotime($dasar['tglSurat'])) . " " . $bulan[intval(date('m', strtotime($dasar['tglSurat']))) - 1] . " " . date('Y', strtotime($dasar['tglSurat'])); ?> tentang <?= $dasar['tentang']; ?>.
    </div>
    <br>

    <!-- perhitungan total HPS -->
    <?php

    use Sabberworm\CSS\Property\Charset;

    foreach ($trxGiatBarang as $b):
        // menghitung rata2
        foreach ($trxReferensi as $trxR) :
            if ($trxR['trxGiatBarangId'] == $b['idTrxGiatBarang']) {
                $harga[] = $trxR['harga'];
            }
        endforeach;
        $hargaRata2 = array_sum($harga) / count($harga);
        $jumlahTiapBarang[] = $b['kebutuhan'] * $hargaRata2;
        unset($harga, $hargaRata2);
    endforeach;
    // echo "ini jumlah seluruhnya" . array_sum($jumlahTiapBarang);
    $jumlahHarga = (((array_sum($jumlahTiapBarang) * 15 / 100) + array_sum($jumlahTiapBarang)) * 12 / 100) + ((array_sum($jumlahTiapBarang) * 15 / 100) + array_sum($jumlahTiapBarang));
    // echo "ini jumlah total " . $jumlahHarga;
    $hps = (bulatkan_rupiah($jumlahHarga));

    // echo number_format($hps, 0, ",", ".") . " (" . terbilang($hps) . " rupiah)"
    ?>
    <!-- akhir perhitungan HPS -->
    <div style="display:inline-block;text-align: justify;">
        2. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dasar tersebut, dikirimkan data Harga Perkiraan Sendiri (HPS) dan Spesifikasi Teknis <?= $kegiatan['namaKegiatan']; ?>, senilai Rp <?= number_format($hps, 0, ",", ".") . " (" . trim(terbilang($hps)) . " rupiah)"; ?> sesuai lampiran.
    </div>
    <br><br>
    <p style="text-align: justify;">
        3. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk menjadi perhatian dan pelaksanaan.
    </p>
    <br><br>
    <div style="text-align: center; text-indent: 50%;"> a.n. Kepala Arsenal</div>
    <div style="text-align: center; text-indent: 50%;"> Kabag Rendalmat</div>
    <div style="text-align: center; text-indent: 50%;"> Selaku</div>
    <div style="text-align: center; text-indent: 50%;"> PPK,</div>
    <br><br><br><br>

    <span style="display: inline-block; width: 49%; text-align: left;">Tembusan :</span>
    <span style="display: inline-block;  width: 49%;text-align:center ; text-indent:1%; "><?= $kegiatan['namaPejabat']; ?></span>

    <div>
        <span style="display:block; text-align: center; text-indent: 50%;"><?= $pangkat['pangkat']; ?> <?= str_contains($pangkat['pangkat'], 'Laksamana') ? "" : " NRP " . $kegiatan['NRP']; ?></span><br>
        <span class="custom-underline" style="text-align: left;">Kaarsenal selaku KPA</span>

    </div>

    <div style="page-break-after: always;"></div>

    <table border="0" cellpading=0 style="line-height: 1; width:100%;">
        <tr>
            <td style="width:390px;text-align: center;">
                DINAS MATERIEL SENJATA DAN ELEKTRONIKA TNI AL
            </td>
            <td style="width:55px;"></td>
            <td colspan="2">
                Lampiran I Surat Kaarsenal
            </td>
        </tr>
        <tr>
            <td style="width:390px; text-align: center;" class="custom-underline">
                ARSENAL
            </td>
            <td></td>
            <td style="width: 70px;">
                Nomor R/
            </td>
            <td style="text-align: right;">
                /<?= number_to_roman(intval(date('m', strtotime($kegiatan['tglSurat'])))); ?>/<?= date('Y', strtotime($kegiatan['tglSurat'])); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2">
                <div style="width: 100%;"> <span style="float: left;">Tanggal</span>
                    <span style="float: right;">
                        <?= $bulan[intval(date('m', strtotime($kegiatan['tglSurat']))) - 1] . " " . date('Y', strtotime($kegiatan['tglSurat'])); ?>
                    </span>
                    <div style="clear: both; height: 0;"></div>
                </div>
            </td>
        </tr>
        <tr style="line-height: 0.1;padding:0px; margin:0px;">
            <td></td>
            <td></td>
            <td colspan="2" style="border-bottom: 1px solid;"></td>
        </tr>





    </table>
    <br><br>
    <div style="text-align: center;">
        HARGA PERKIRAAN SENDIRI (HPS) <br>
        <?= strtoupper($kegiatan['namaKegiatan']); ?>
    </div>
    <br><br>
    <table style="text-align:justify;margin: left -5px; width: 100%;">
        <tr>
            <td style="width: 30px;">1. </td>
            <td>Total HPS = Rp <?= number_format($hps, 2, ",", "."); ?></td>
        </tr>
        <tr>
            <td style="width: 30px;">2.</td>
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

        <?php
        $char = "c";
        $banyakHuruf = 1;
        $cetakHuruf = "";
        $a = 0;
        foreach ($trxGiatBarang as $b) : //list barang yang dipilih
            foreach ($trxReferensi as $trxR) :
                if ($trxR['trxGiatBarangId'] == $b['idTrxGiatBarang']) {
                    $cetak[] = [
                        'link' => $trxR['link'],
                        'harga' => $trxR['harga']
                    ];
                }
            endforeach;

            if (!empty($cetak)) {
                foreach ($cetak as $c) :
        ?>
                    <tr>
                        <td style="width: 10px;"></td>
                        <td>
                            <div style="text-align:justify; word-spacing: 0.2em; letter-spacing: 0.05em;">
                                <?php
                                $jarakSpasi = 12;
                                // Print the letter (c., d., etc.) before the reference
                                $text = $char . '.&nbsp;&nbsp;&nbsp;';
                                $rawLink = $c['link'];
                                // Tambahkan spasi setiap 10 karakter untuk link panjang agar justify bekerja
                                if (strlen($rawLink) > 25) {
                                    $rawLink = preg_replace('/(.{10})/', '$1 ', $rawLink);
                                }
                                $kalimat = 'Dari referensi website ' . $rawLink;
                                $text .= $kalimat . ' diketahui ';
                                foreach ($barang as $brg) :
                                    if ($b['barangId'] == $brg['idBarang']) {
                                        $text .= "1 " . $brg['namaSatuan'] . " " . $brg['namaBarang'];
                                    }
                                endforeach;
                                $text .= ' tanpa PPN 12% seharga Rp ' . number_format($c['harga'], 0, ",", ".");
                                echo $text;
                                $char++;
                                ?>
                            </div>
                        </td>
                    </tr>
        <?php
                endforeach;
                unset($cetak);
            }
        endforeach;
        ?>
        <tr>
            <td colspan="2">3. &nbsp;&nbsp;&nbsp;&nbsp;Analisa Harga.&nbsp;&nbsp;&nbsp;Dari referensi tersebut diatas dapat diperhitungkan bahwa jumlah anggaran <?= $kegiatan['namaKegiatan']; ?> adalah sebagai berikut : <br><br></td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td>a. &nbsp;&nbsp;&nbsp; Biaya kebutuhan material:</td>
        </tr>
    </table>


    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: center; margin-top: 10px; table-layout: fixed;">
        <thead>

            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 12%;">Materiel</th>
                <th style="width: 8%;">Harga Satuan 1</th>
                <th style="width: 8%;">Harga Satuan 2</th>
                <th style="width: 8%;">Rata-rata Harga Satuan</th>
                <th style="width: 10%;">Kebutuhan</th>
                <th style="width: 12%;">Jumlah Harga</th>
            </tr>
        </thead>
        <tbody style="overflow-wrap: break-word;">
            <?php
            $n = 1;
            $huruf = 'A';
            $currentSubKegiatan = null;
            // dd($trxGiatBarang);
            foreach ($trxSubKegiatan as $b) :
                if ($currentSubKegiatan !== $b['nama']) {

            ?>
                    <tr>
                        <td colspan="7" style="text-align: left;padding-left:20px;text-transform: uppercase;font-weight:bold;"><?= $huruf . '.  ' . $b['nama']; ?></td>
                    </tr>
                <?php
                    $currentSubKegiatan = $b['nama'];
                    $huruf++;
                }

                ?>

                ?>
                <tr>
                    <td><?= $n++; ?></td>
                    <td style="text-align: left;">
                        <?php
                        foreach ($barang as $brg) :
                            if ($b['barangId'] == $brg['idBarang']) {
                                echo $brg['namaBarang'];
                            }
                        endforeach;
                        ?>
                    </td>
                    <?php
                    foreach ($trxReferensi as $trxR) :
                        if ($trxR['trxGiatBarangId'] == $b['idTrxGiatBarang']) {
                            $cetakHarga[] = $trxR['harga'];
                        }
                    endforeach;
                    ?>
                    <td style="text-align: right;">
                        <!-- harga 1 -->
                        <?= (isset($cetakHarga[0])) ? number_format($cetakHarga[0], 0, ",", ".") : ""; ?>
                    </td>
                    <td style="text-align: right;">
                        <!-- harga 2-->
                        <?php
                        echo (isset($cetakHarga[1])) ? number_format($cetakHarga[1], 0, ",", ".") : "";
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if (isset($cetakHarga)) {
                            $cetakAverage = array_sum($cetakHarga) / count($cetakHarga);
                            echo number_format($cetakAverage, 0, ",", ".");
                        }
                        unset($cetakHarga);
                        ?>

                    </td>
                    <td style="text-align: right;">
                        <?php
                        echo $b['kebutuhan'] . " ";
                        $kebutuhan = $b['kebutuhan'];
                        foreach ($barang as $brg) :
                            if ($b['barangId'] == $brg['idBarang']) {
                                echo $brg['namaSatuan'];
                            }
                        endforeach;
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        $jumlah[$n] = $kebutuhan * $cetakAverage;
                        echo number_format($jumlah[$n], 0, ",", ".");
                        ?>
                    </td>
                </tr>

            <?php
            endforeach;
            ?>

            <tr style="text-align: right;">
                <td colspan="6"> Total Jumlah Harga</td>
                <td>
                    <?php
                    $total = array_sum($jumlah);
                    echo number_format($total, 2, ",", ".");
                    ?>
                </td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> Over head cost dan keuntungan 15%</td>
                <td>
                    <?php
                    $keuntungan = $total * 15 / 100;
                    echo number_format($keuntungan, 2, ",", ".");
                    ?>
                </td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> Total Jumlah Harga</td>
                <td style="text-align: right;">
                    <?php
                    $total = $total + $keuntungan;
                    echo number_format($total, 2, ",", ".");
                    ?>
                </td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> PPN 12%</td>
                <td>
                    <?php
                    $ppn = $total * 12 / 100;
                    echo number_format($ppn, 2, ",", ".");
                    ?>

                </td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="6"> Total Jumlah Harga</td>
                <td style="text-align: right;">
                    <?php
                    $total = $total + $ppn;
                    echo number_format($total, 2, ",", ".");
                    ?>
                    <br>

                </td>
            </tr>
    </table>
    <br>


    <table style="width: 100%;">
        <tr>
            <td style="width: 30px;"></td>
            <td colspan="2">b. &nbsp;&nbsp;&nbsp; Total biaya keseluruhan adalah:</td>
        </tr>

        <tr>
            <td style="width: 30px;"></td>
            <td style="width: 30px;"></td>
            <td>= Rp <?= number_format($total, 2, ",", "."); ?></td>
        </tr>
        <tr>
            <td style="width: 30px;"></td>
            <td style="width: 30px;"></td>
            <td>= Rp
                <?php
                $total_bulat = bulatkan_rupiah($total);
                echo number_format($total_bulat, 0, ",", "."); ?> (pembulatan)</td>
        </tr>
    </table>
    <br><br>

    <table style="text-align:justify;margin: left -5px;">
        <tr>
            <td colspan="2">4. &nbsp;&nbsp;&nbsp;&nbsp;Kesimpulan.&nbsp;&nbsp;&nbsp;Dari analisa harga di atas, diperoleh HPS yang dapat dijadikan sebagai acuan dalam penentuan biaya <?= $kegiatan['namaKegiatan']; ?> adalah Rp <?= number_format(bulatkan_rupiah($total), 0, ",", ".") . " (" . terbilang($total_bulat) . " rupiah)"; ?>. <br><br></td>
        </tr>
    </table>

    <div style="text-align: center; text-indent: 50%;"> a.n. Kepala Arsenal</div>
    <div style="text-align: center; text-indent: 50%;"> Kabag Rendalmat</div>
    <div style="text-align: center; text-indent: 50%;"> Selaku</div>
    <div style="text-align: center; text-indent: 50%;"> PPK,</div>
    <br><br><br><br>
    <div style="text-align: center; text-indent: 50%;"><?= $kegiatan['namaPejabat']; ?></div>
    <div style="text-align: center; text-indent: 50%;"><?= $pangkat['pangkat']; ?> <?= str_contains($pangkat['pangkat'], 'Laksamana') ? "" : " NRP " . $kegiatan['NRP']; ?></div>





    <div style="page-break-after: always;"></div>


    <!-- Lampiran II  -->

    <table border="0" cellpading=0 style="line-height: 1; width:100%;">
        <tr>
            <td style="width:390px;text-align: center;">
                DINAS MATERIEL SENJATA DAN ELEKTRONIKA TNI AL
            </td>
            <td style="width:50px;"></td>
            <td colspan="2">
                Lampiran II Surat Kaarsenal
            </td>
        </tr>
        <tr>
            <td style="width:390px; text-align: center;" class="custom-underline">
                ARSENAL
            </td>
            <td></td>
            <td style="width: 70px;">
                Nomor R/
            </td>
            <td style="text-align: right;">
                /<?= number_to_roman(intval(date('m', strtotime($kegiatan['tglSurat'])))); ?>/<?= date('Y', strtotime($kegiatan['tglSurat'])); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2">
                <div style="width: 100%;"> <span style="float: left;">Tanggal</span>
                    <span style="float: right;">
                        <?= $bulan[intval(date('m', strtotime($kegiatan['tglSurat']))) - 1] . " " . date('Y', strtotime($kegiatan['tglSurat'])); ?>
                    </span>
                    <div style="clear: both; height: 0;"></div>
                </div>
            </td>
        </tr>
        <tr style="line-height: 0.1;padding:0px; margin:0px;">
            <td></td>
            <td></td>
            <td colspan="2" style="border-bottom: 1px solid;"></td>
        </tr>
    </table>
    <br><br>

    <div style="text-align: center;">
        SPESIFIKASI TEKNIS<br>
        <?= $kegiatan['namaKegiatan']; ?>
    </div>
    <br>

    <table border=1 cellpadding="5" cellspacing="0" style="width: 100%; text-align: center;">
        <thead style="line-height: 2;">
            <th>NO</th>
            <th>SPESIFIKASI TEKNIS/URAIAN PEKERJAAN</th>
            <th>JUMLAH/SAT</th>
        </thead>
        <tbody>
            <tr style="font-weight: bold;">
                <td style="width: 30px;"></td>
                <td style="text-align: left;padding-left:20px; ">Kebutuhan materiel</td>
                <td></td>
            </tr>
            <?php
            $n = 1;
            foreach ($trxGiatBarang as $b) :
            ?>
                <tr>
                    <td style="width: 30px;"><?= $n++; ?></td>
                    <td style="text-align: left; padding-left:20px;">

                        <?php
                        foreach ($barang as $brg) :
                            if ($b['barangId'] == $brg['idBarang']) {
                                echo $brg['namaBarang'];
                            }
                        endforeach;
                        ?>

                    </td>
                    <td style="text-align: right;padding-right:20px;">
                        <?php

                        echo $b['kebutuhan'] . " ";

                        foreach ($barang as $brg) :
                            if ($b['barangId'] == $brg['idBarang']) {
                                echo $brg['namaSatuan'];
                            }
                        endforeach;
                        ?>

                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

    <br><br>
    <div style="text-align: center; text-indent: 50%;"> a.n. Kepala Arsenal</div>
    <div style="text-align: center; text-indent: 50%;"> Kabag Rendalmat</div>
    <div style="text-align: center; text-indent: 50%;"> Selaku</div>
    <div style="text-align: center; text-indent: 50%;"> PPK,</div>
    <br><br><br><br>
    <div style="text-align: center; text-indent: 50%;"><?= $kegiatan['namaPejabat']; ?></div>
    <div style="text-align: center; text-indent: 50%;"><?= $pangkat['pangkat']; ?> <?= str_contains($pangkat['pangkat'], 'Laksamana') ? "" : " NRP " . $kegiatan['NRP']; ?></div>


    <div style="page-break-after: always;"></div>

    <!-- Lampiran III  -->

    <table border="0" cellpading=0 style="line-height: 1; width:100%;">
        <tr>
            <td style="width:390px;text-align: center;">
                DINAS MATERIEL SENJATA DAN ELEKTRONIKA TNI AL
            </td>
            <td style="width:45px;"></td>
            <td colspan="2">
                Lampiran III Surat Kaarsenal
            </td>
        </tr>
        <tr>
            <td style="width:390px; text-align: center;" class="custom-underline">
                ARSENAL
            </td>
            <td></td>
            <td style="width: 100px;">
                Nomor R/
            </td>
            <td style="text-align: right;">
                /<?= number_to_roman(intval(date('m', strtotime($kegiatan['tglSurat'])))); ?>/<?= date('Y', strtotime($kegiatan['tglSurat'])); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2">
                <div style="width: 100%;"> <span style="float: left;">Tanggal</span>
                    <span style="float: right;">
                        <?= $bulan[intval(date('m', strtotime($kegiatan['tglSurat']))) - 1] . " " . date('Y', strtotime($kegiatan['tglSurat'])); ?>
                    </span>
                    <div style="clear: both; height: 0;"></div>
                </div>
            </td>
        </tr>
        <tr style="line-height: 0.1;padding:0px; margin:0px;">
            <td></td>
            <td></td>
            <td colspan="2" style="border-bottom: 1px solid;"></td>
        </tr>
    </table>
    <br><br>

    <div style="text-align: center;">
        GAMBAR
    </div>
    <br>
    <p>A. Kebutuhan Materiel</p>

    <!-- menampilkan data di tabel -->
    <?php

    // ... (Bagian pra-proses data barang, sama seperti sebelumnya) ...
    $columnLimit = 7;
    $displayItems = [];
    foreach ($trxGiatBarang as $b) {
        foreach ($barang as $brg) {
            if ($b['barangId'] == $brg['idBarang']) {
                $imagePath = FCPATH . 'assets/images/' . $brg['gambar'];
                $imageSrc = 'data:image/png;charset=utf-8;base64,iVBORw0KGgoAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII='; // Default transparent pixel

                if (file_exists($imagePath)) {
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $imageSrc = 'data:image/png;charset=utf-8;base64,' . $imageData;
                } else {
                    error_log("Image not found: " . $imagePath);
                }

                $displayItems[] = [
                    'name' => $brg['namaBarang'],
                    'image_src' => $imageSrc
                ];
            }
        }
    }
    ?>

    <table cellpadding="0" cellspacing="0" style="width: 100%; text-align: center; margin-top: 10px; border-collapse: collapse;border:none">
        <?php
        $itemCount = count($displayItems);
        $currentItemIndex = 0;

        while ($currentItemIndex < $itemCount) {
            echo '<tr>';
            for ($i = 0; $i < $columnLimit; $i++) {
                if ($currentItemIndex < $itemCount) {
                    $item = $displayItems[$currentItemIndex];
                    // Tambahkan kelas 'has-content' untuk sel yang ada isinya
                    echo '<td class="has-content" style="width: ' . (100 / $columnLimit) . '%; border: 1px solid black; padding: 5px;">';
                    echo '<img src="' . $item['image_src'] . '" width="75" height="75" alt="' . $item['name'] . '"><br>';
                    echo $item['name'];
                    echo '</td>';
                    $currentItemIndex++;
                } else {
                    // Untuk sel kosong, jangan tambahkan border di inline style
                    echo '<td class="empty-cell" style="width: ' . (100 / $columnLimit) . '%; padding: 5px;border:none;">';
                    echo '&nbsp;'; // Penting agar sel tidak collapse
                    echo '</td>';
                }
            }
            echo '</tr>';
        }
        ?>
    </table>



    <!-- akhir menampilkan data di tabel -->






    <br>



    <br><br>
    <div style="text-align: center; text-indent: 50%;"> a.n. Kepala Arsenal</div>
    <div style="text-align: center; text-indent: 50%;"> Kabag Rendalmat</div>
    <div style="text-align: center; text-indent: 50%;"> Selaku</div>
    <div style="text-align: center; text-indent: 50%;"> PPK,</div>
    <br><br><br><br>
    <div style="text-align: center; text-indent: 50%;"><?= $kegiatan['namaPejabat']; ?></div>
    <div style="text-align: center; text-indent: 50%;"><?= $pangkat['pangkat']; ?> <?= str_contains($pangkat['pangkat'], 'Laksamana') ? "" : " NRP " . $kegiatan['NRP']; ?></div>


</body>

</html>