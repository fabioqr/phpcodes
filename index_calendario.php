<?php
include 'header.php';
?>

<div class="calendario">

    <?php
    $calendario = new src\classes\calendario();

    $calendario->criarCalendario();

    include 'footer.php';
    