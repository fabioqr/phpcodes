<?php

namespace src\classes;

class calendario extends \src\database\connect {

    private $tabela = 'eventos';

    function __construct() {
        
    }

    private function diasMeses() {
        $diasMeses = array();
        for ($i = 1; $i <= 12; $i++) {
            $diasMeses[$i] = cal_days_in_month(CAL_GREGORIAN, $i, date('Y'));
        }
        return $diasMeses;
    }

    public function criarCalendario() {

        $daysWeek = array(
            'Sun',
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat'
        );
        $diasSemanas = array(
            'Dom',
            'Seg',
            'Ter',
            'Qua',
            'Qui',
            'Sex',
            'Sab'
        );
        $arrayMes = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );

        $diasmeses = self::diasMeses();
        $arrayRetorno = array();
        for ($i = 1; $i <= 12; $i++) {
            $arrayRetorno[$i] = array(
            );

            for ($n = 1; $n <= $diasmeses[$i]; $n++) {
                $dayMonth = gregoriantojd($i, $n, date('Y'));
                $weekMonth = jddayofweek($dayMonth, 2);
                if ($weekMonth == 'Mun') {
                    $weekMonth = 'Mon';
                }
                $arrayRetorno[$i][$n] = $weekMonth;
            }
        }
        echo '<a href="#" id="volta">&laquo</a>';
        echo '<a href="#" id="vai">&raquo</a>';
        echo '<table border="0" width=100% id=tb_calendario>';
        foreach ($arrayMes as $num => $mes) {
            echo '<tbody id=mes_' . $num . ' class="mes">';
            echo '<tr class="mes_title"><td colspan=7>' . $mes . '</td></tr> <tr class="dias_title">';
            foreach ($diasSemanas as $i => $day) {
                echo '<td>' . $day . '</td>';
            }
            echo '</tr><tr>';
            $y = 0;
            foreach ($arrayRetorno[$num] as $numero => $dia) {
                $y++;
                if ($numero == 1) {
                    $qtd = array_search($dia, $daysWeek);
                    for ($i = 1; $i <= $qtd; $i++) {
                        echo '<td></td>';
                        $y += 1;
                    }
                }
                echo '<td>' . $numero . '</td>';
                if ($y == 7) {
                    $y = 0;
                    echo '</tr><tr>';
                };
            }
            echo '</tr>';
            echo '</tbody>';
        }
    }

    private function inserirEventos($evento_info) {

        $titulo = $evento_info['titulo'];
        $dia = date("Y-m-d", strtotime(str_replace('/', '-', $evento_info['data'])));
        $descricao = $evento_info['descricao'];
        $sql = "INSERT INTO eventos (titulo, dia, descricao) VALUES ( ' " . $titulo . "',' " . $dia . "', '" . $descricao . "')";
        /* $iserir = */ $this->insertDB($sql);
        //$select = "SELECT * FROM eventos WHERE id=$iserir";
        //return print_r($this->selectDB($select));
    }

    public function executarInserirEventos($evento_info) {
        return $this->inserirEventos($evento_info);
    }

    private function exbirTodosEventos() {
        $select = "SELECT * FROM eventos";

        return $this->selectDB($select);
    }

    public function executarExbirTodosEventos() {
        return $this->exbirTodosEventos();
    }

}
