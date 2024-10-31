<?php

require '../../vendor/autoload.php';

include '../DataBase.php'; 
use Dompdf\Dompdf;


$css = file_get_contents(__DIR__ . '/../view/styles/tables.css');
$mes = [
    1 => 'JANEIRO',
    2 => 'FEVEREIRO',
    3 => 'MARÇO',
    4 => 'ABRIL',
    5 => 'MAIO',
    6 => 'JUNHO',
    7 => 'JULHO',
    8 => 'AGOSTO',
    9 => 'SETEMBRO',
    10 => 'OUTUBRO',
    11 => 'NOVEMBRO',
    12 => 'DEZEMBRO',
];

$mes_atual = date('n');


$html = "<html>
    <head>
        <title>LISTA BENEFICIÁRIO</title>
        <style>
            $css
        </style>
    </head>
    <body> 
    <table class='table'>
        <tr>
            <td colspan='11'>LISTA DE BENEFICIÁRIOS - ESPORTE POR TODA PARTE 2024</td>
        </tr>
        <tr>
            <td colspan='5'>NOME DA ENTIDADE OU ÓRGÃO PROPONENTE: SUDESB</td>
            <td colspan='6'>MÊS DE REFERÊNCIA: $mes[$mes_atual]</td>
        </tr>
        <tr>
            <td colspan='4' style='width: 10%;'>COORD. SETORIAL: JANSEN NASCIMENTO</td>
            <td style='width: 30%;'>N° NÚCLEO: MUNICÍPIO: MAIRI</td>
            <td colspan='11' style='width: 30%;'>MODALIDADE: FUTEBOL</td>
        </tr>
        <tr>
            <td>N°</td>
            <td>NOME DO BENEFICIÁRIO</td>
            <td>SEXO</td>
            <td>DATA DE NASCIMENTO</td>
            <td>PCD? (SE SIM, IDENTIFICAR)</td>
            <td>CPF</td>
            <td>CPF DO RESPONSÁVEL</td>
            <td>ENDEREÇO</td>
            <td>CEP</td>
            <td>ESCOLARIDADE</td>
            <td>RAÇA/COR</td>
        </tr>";  

$sql = "SELECT * FROM danca";
$res = $conn->query($sql);


$dompdf = new Dompdf();



while ($row = $res -> fetch_object()){
 

$html .= "<tr>
    <td>{$row->id}</td>
    <td>{$row->nome}</td>
    <td>{$row->sexo}</td>
    <td>{$row->data_nasc}</td>
    <td>{$row->pcd}. {$row->condicao_pcd}</td>
    <td>{$row->cpf}</td>
    <td>{$row->cpf_resp}</td>
    <td>{$row->endereco}</td>
    <td>{$row->cep}</td>
    <td>{$row->escolaridade}</td>
    <td>{$row->raca}</td>
    </tr>";

}

$html .= "</table></body></html>";

$dompdf->loadHtml($html);


$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("FUTEBOL.pdf", ); //para baixar o documento tira o false ["Attachment" => true]
