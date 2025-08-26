<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Siap</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">


    <!-- jquery -->
    <?= link_tag('assets/css/jquery-ui.css', 'stylesheet'); ?>


    <!-- bootstrap icon  -->
    <?= link_tag('assets/css/bootstrap-icons-1.13.1/bootstrap-icons.min.css', 'stylesheet'); ?>

    <!-- My CSS -->
    <?= link_tag('assets/css/style.css', 'stylesheet'); ?>

    <!-- <link rel="icon" href="public/favicon.ico"> -->
    <?= link_tag('favicon.ico', 'icon'); ?>
</head>

<body>



    <?= $this->include('layout/navbar'); ?>

    <?= $this->renderSection('content'); ?>





    <!-- jss bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>


    <!--jquery -->
    <?= script_tag('assets/js/jquery-3.7.1.min.js'); ?>
    <?= script_tag('assets/js/jquery-ui.min.js'); ?>


    <!-- script js ku -->
    <?= script_tag('assets/js/myscript.js'); ?>

</body>

</html>