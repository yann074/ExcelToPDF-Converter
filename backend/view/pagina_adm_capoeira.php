<?

session_start();
if($_SESSION['usuario'] !== true){
header("Location: /");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador Capoeira</title>
    <link rel="stylesheet" href="../view/styles/pagina_adm.css">
</head>
<body>
<div class="buttons">
        <a href="?page=novo"><button>Adicionar Pessoa</button></a>
        <a href="../controllers/pdf_capoeira.php"><button>Baixar PDF</button></a>
        <a href="?page=buscar"><button>Buscar</button></a>
        <a href="?page=listar"><button>Listar</button></a>
        <a href="?page=importar"><button>Importar Excel</button></a>
    </div>

    <?php 

    switch(@$_REQUEST["page"]){
        case "novo":
          include  __DIR__ . "../../view/tables/tabela_capoeira.php";
        break;
        case "buscar":
            include  __DIR__ . "../../controllers/BuscarPessoa.php";

            ?>
            <form action="../controllers/BuscarPessoa.php" method="get">
                <input type="text" name="busca">
                <button>buscar</button>
            </form>
            <?
            
          break;

          case "listar":
            include "./DataBase.php";
            $sql = "SELECT * FROM capoeira";
            $res = $conn->query($sql);

            while ($row = $res -> fetch_object()){
            ?>
            <p> <? echo $row->id?> <? echo $row->nome?> <a href="../controllers/Delete_capoeira.php?id=<?php echo $row->id ?> "onclick="return confirm('Tem certeza que deseja deletar este item?')" >Deletar</a></p>
            <?
            }
          break;
          case "importar":
            ?>
             <form action="../controllers/Excel_capoeira.php" method="post" enctype="multipart/form-data">
                <input type="file" name="arquivo" id="">
                <button>enviar</button>
            </form>
            <?
    }

    ?>



</body>
</html>