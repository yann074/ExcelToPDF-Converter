<?php 

//definir os horarios
date_default_timezone_set("America/Sao_Paulo");

    function conexao(){
        $conn = [
            'local' => '127.0.0.1',
            'usuario' => 'root',
            'senha' => '',
            'bd' => 'bd_pdf'
        ];


        try{
            $mysqli = new mysqli($conn['local'], $conn['usuario'], $conn['senha'], $conn['bd']);
            if ($mysqli->connect_errno) {
                echo "Erro ao Conectar o BD: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                exit;
            }
        }catch (Exception $e){
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $mysqli;
    }

    $conn = conexao();