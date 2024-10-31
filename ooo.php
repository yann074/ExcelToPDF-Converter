<?php

// reference the Dompdf namespace
require './vendor/autoload.php';

include 'backend/DataBase.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class

$html = "<html><head><title>Nomes</title></head><body><table>
        <tr>
            <td>LISTA DE BENEFICIÁRIOS - ESPORTE POR TODA PARTE 2024</td>
        </tr>
        <tr>
            <td>NOME DA ENTIDADE OU ÓRGÃO PROPONENTE: SUDESB</td>
            <td>MÊS DE REFERÊNCIA: AGOSTO</td>
        </tr>
        <tr>
            <td>COORD. SETORIAL: JANSEN NASCIMENTO </td>
            <td> N° NÚCLEO: MUNICÍPIO: MAIRI</td>
            <td>MODALIDADE: FUTEBOL</td>
        </tr>";  

$sql = "SELECT * FROM dados";
$res = $conn->query($sql);


$dompdf = new Dompdf();


while ($row = $res -> fetch_object()){

$html .= "<tr>
    <td>{$row->nome}</td>
    <td>{$row->email}</td>
    </tr>";

}

$html .= "</table></body></html>";

$dompdf->loadHtml($html);


$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("aa",["Attachment" => false]);


//aprender a usar o dom PDF