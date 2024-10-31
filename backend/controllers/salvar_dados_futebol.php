<?php
include '../DataBase.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $table = 'futebol';

    $nome = trim($_POST['nome']);
    $sexo = trim( $_POST['sexo']);
    $data_nasc = trim( $_POST['data']);
    $pcd = trim($_POST['pcd']);
    $condicao = trim($_POST['pcd_descricao']);
    $cpf = trim($_POST['cpf']);
    $cpf_resp = trim($_POST['cpf_resp']);
    $endereco = trim($_POST['endereco']);
    $cep = trim($_POST['cep']);
    $escolaridade = trim($_POST['escolaridade']);
    $raca = trim($_POST['raca']);
    
    $query_cpf = "SELECT * FROM $table WHERE cpf = '{$cpf}'";
    
    $verificar_cpf = $conn->query($query_cpf);

    if($verificar_cpf->num_rows > 0){
        print '<script>alert("esse cpf ja existe")</script>';
        header("Location: /futebol?page=novo");
        die;
    }elseif(empty($nome) || empty($sexo) || empty($data_nasc) || empty($pcd) || empty($cpf) || empty($cpf_resp) || empty($endereco) || empty($cep) || empty($escolaridade) || empty($raca)){
        print '<script>alert("Não pode ter dados vazios")</script>';
        header("Location: /futebol?page=novo&vazio=1");
    }else{
        
    $query = "INSERT INTO $table (nome, sexo, data_nasc, pcd, cpf, cpf_resp, endereco, cep, escolaridade, raca) 
    VALUES ('{$nome}', '{$sexo}', '{$data_nasc}', '{$pcd}', '{$cpf}', '{$cpf_resp}', '{$endereco}', '{$cep}', '{$escolaridade}', '{$raca}')";

    $res = $conn->query($query);

        if($res == true){
            print '<script>alert("cadastro feito com sucesso");</script>';
            header("Location: /futebol?page=listar");
        }else{
            print '<script>alert("Algo deu errado, tente novamente")</script>';
        } 
    };  
    
    printf("Error: %s.\n");
    return false;
} 


