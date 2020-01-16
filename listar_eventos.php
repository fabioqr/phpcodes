<?php

include 'vendor/autoload.php';

$lista = new classes\Eventos();
$re = $lista->getBuscarEventos('c_central');

foreach ($re AS $data) {
    $ID = $data->ID;
    $titulo = $data->Titulo;
    $Color = $data->Color;
    if($data->diainteiro == TRUE){
    $Inicio = date("Y-m-d", strtotime($data->Inicio));
    $Termino = date("Y-m-d", strtotime($data->Termino));    
    } else {
    $Inicio = date("Y-m-d", strtotime($data->Inicio)).'T'.date("H:i:s", strtotime($data->Inicio));
    $Termino = date("Y-m-d", strtotime($data->Termino)).'T'.date("H:i:s", strtotime($data->Termino));    
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
