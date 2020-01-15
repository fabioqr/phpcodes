<?php

include 'vendor/autoload.php';

$lista = new classes\Eventos();
$re = $lista->getBuscarEventos('c_central');

foreach ($re AS $data) {
    $ID = $data->ID;
    $titulo = $data->Titulo;
    $Color = $data->Color;
    $Inicio = date("Y-m-d", strtotime($data->Inicio));
    if (isset($data->Termino)) {
        $Termino = date("Y-m-d", strtotime($data->Termino));
    } else {
        $Termino = $data->Termino;
    }
    $events [] = [
        'id' => $ID,
        'title' => $titulo,
        'color' => $Color,
        'start' => $Inicio,
        'end' => $Termino
    ];
}
echo json_encode($events);
