<?php
include 'header.php';
?>

<div class="calendario">

    <?php
    $calendario = new classes\calendario();

    $calendario->criarCalendario();

    include 'footer.php';
    