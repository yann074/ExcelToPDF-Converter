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
        <a href="../controllers/pdf_danca.php"><button>Baixar PDF</button></a>
        <a href="?page=buscar"><button>Buscar</button></a>
        <a href="?page=listar"><button>Listar</button></a>
    </div>

    <?php 

    switch(@$_REQUEST["page"]){
        case "novo":
          include  __DIR__ . "../../view/tables/tabela_danca.php";
        break;
        case "buscar":
            include  __DIR__ . "../../controllers/BuscarPessoaDanca.php";

            ?>
            <form action="../controllers/BuscarPessoaDanca.php" method="get">
                <input type="text" name="busca">
                <button>buscar</button>
            </form>
            <?
            
          break;

          case "listar":
            include "./DataBase.php";
            $sql = "SELECT * FROM danca";
            $res = $conn->query($sql);

            while ($row = $res -> fetch_object()){
            ?>
            <p><? echo $row->nome?></p>
            
            <?
            }
          break;
    }
    ?>



</body>
</html>