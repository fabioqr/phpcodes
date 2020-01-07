<?php
include 'header.php';
?>

<div class="calendario">

    <?php
    $calendario = new src\classes\calendario();

    $calendario->criarCalendario();

    $eventos = $calendario->executarExbirTodosEventos();
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITULO</th>
                <th>DATA</th>
                <th>DESCRIÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($eventos AS $data){
                $id = $data->id;
                $titulo = $data->titulo;
                $dia = new DateTime($data->dia);
                $descricao = $data->descricao;
                ?>
                </div>


                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $titulo; ?></td>
                    <td><?php echo $dia->format('d/m/Y'); ?></td>
                    <td><?php echo $descricao; ?></td>
                </tr>


                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    include 'footer.php';
    