<?php

include __DIR__ . "/../DataBase.php";

$arquivo = $_FILES['arquivo'];

$linhas_importadas = 0;
$linhas_nao_importadas = 0;
$usuarios_nao_importados = "";

if ($arquivo['type'] == "text/csv") {
    $dados_arquivo = fopen($arquivo['tmp_name'], "r");
    while ($linha = fgetcsv($dados_arquivo, 1000, ";")) {
        array_walk_recursive($linha, 'converter');

        $data_nasc_obj = DateTime::createFromFormat('d/m/Y', $linha[3]);
        if ($data_nasc_obj === false) {
            $linhas_nao_importadas++;
            $usuarios_nao_importados .= ", " . ($linha[0] ?? "NULL") . " (data inválida)";
            continue; 
        }
        $data_nasc = $data_nasc_obj->format('Y-m-d'); 
        $sql = "INSERT INTO capoeira (nome, sexo, data_nasc, pcd, cpf, cpf_resp, endereco, cep, escolaridade, raca)  
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $query = $conn->prepare($sql);
        $query->bind_param(
            'ssssssssss',
            $linha[1], 
            $linha[2],
            $data_nasc, 
            $linha[4], 
            $linha[5],
            $linha[6], 
            $linha[7], 
            $linha[8],
            $linha[9],
            $linha[10] 
        );

        // Execute a consulta
        if ($query->execute()) {
            $linhas_importadas++;
            header("Location: /capoeira?page=listar");
        } else {
            $linhas_nao_importadas++;
            $usuarios_nao_importados .= ", " . ($linha[0] ?? "NULL");
        }
    }

    echo "$linhas_importadas ";
    echo "$linhas_nao_importadas";
    echo "$usuarios_nao_importados";
} else {
    echo "error";
}

function converter(&$dados_arquivo) {
    $dados_arquivo = mb_convert_encoding($dados_arquivo, "utf-8", "ISO-8859-1");
}
