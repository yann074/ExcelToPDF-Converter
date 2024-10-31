<?php

session_start();

include __DIR__ . "../../DataBase.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    //verificar o adm
    $table = "administrador";

    $email = $_POST['email'];
    $senha = $_POST['password'];

    $query = "SELECT * FROM $table WHERE email = ? AND senha = ?";

    $res = $conn->prepare($query);
    $res->bind_param("ss", $email, $senha);
    $res->execute();
    $resul = $res->get_result();


    if($resul->num_rows == 1){
        $_SESSION['usuario'] = true;
        header("Location: /adm");
        exit;
    }else{
            header("Location: /?error=1");
            exit;
        
    }
    
}