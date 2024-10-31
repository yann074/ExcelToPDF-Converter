<?
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/forms.css">
</head>
<body>

    <form action="../../controllers/AtualizarDados.php" method="post">
        <input type="hidden" name="id">
        <input type="text" name="nome" placeholder="Nome do Beneficiário">
        <select name="sexo" id="">
            <option value="">Sexo</option>
            <option value="1">M</option>
            <option value="2">F</option>
        </select>
        <label for="">Data de Nascimento</label>
        <input type="date" name="data">
        <select name="pcd" id="">
            <option value="">PCD</option>
            <option value="1">Sim</option>
            <? //usar um if para text ?>
            <option value="2">Nao</option>
        </select>
        <input type="text" placeholder="CPF" name="cpf">
        <input type="text" placeholder="CPF do Responsável" name="cpf_resp">
        <input type="text" name="endereco" id="" placeholder="Endereço">
        <input type="text" name="cep" placeholder="CEP">
        <select name="escolaridade" id="">
            <option value="">Escolaridade</option>
            <option value="1">Fundamental 1</option>
            <option value="2">Fundamental 2</option>
            <option value="3">Ensino Médio</option>
        </select>
        <select name="raca" id="">
            <option value="">Raça/Cor</option>
            <option value="1">Branco</option>
            <option value="2">Parda</option>
            <option value="3">Amarelo</option>
            <option value="4">Preto</option>
        </select>
        <button>Enviar</button>
    </form>
</body>
</html>

