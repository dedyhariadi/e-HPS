<!DOCTYPE html>
<html>

<head>
    <title>Dompdf Border Test</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            /* WAJIB! */
            /* border-spacing: 0; */
            /* Ini diabaikan jika border-collapse: collapse */
        }

        td {
            border: 1px solid black;
            /* Border yang Anda inginkan */
            padding: 10px;
            /* Agar ada ruang */
            height: 50px;
            /* Pastikan sel punya tinggi */
            text-align: center;
        }
    </style>
</head>

<body>

    <table style="width: 80%; margin: 20px auto;">
        <tr>
            <td>Data 1.1</td>
            <td>Data 1.2</td>
            <td>Data 1.3</td>
        </tr>
        <tr>
            <td>Data 2.1</td>


        </tr>
        <tr>
            <td>Data 3.1</td>
            <td>Data 3.2</td>
            <td>Data 3.3</td>
        </tr>
    </table>

</body>

</html>