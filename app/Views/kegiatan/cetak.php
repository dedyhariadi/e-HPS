    <!DOCTYPE html>
    <html>

    <head>
        <title>Kegiatan</title>
        <style>
            body {
                font-family: DejaVu Sans, sans-serif;
                /* Penting untuk dukungan karakter */
            }

            .page-number {
                text-align: right;
            }
        </style>
    </head>

    <body>
        <h1>Daftar Kegiatan</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kegiatan as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['tanggal'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="page-number">
            Halaman
            <script type="text/php">
                if ( isset($pdf) ) {
                    $pdf->page_script('
                        $font = $fontMetrics->get_font("DejaVu Sans", "normal");
                        $size = 9;
                        $y = $pdf->get_height() - 35;
                        $x = $pdf->get_width() - 15 - $fontMetrics->get_text_width("Halaman " . $PAGE_NUM . " dari " . $PAGE_COUNT . "", $font, $size);
                        $pdf->text($x, $y, "Halaman " . $PAGE_NUM . " dari " . $PAGE_COUNT . "", $font, $size);
                    ');
                }
            </script>
        </div>
    </body>

    </html>