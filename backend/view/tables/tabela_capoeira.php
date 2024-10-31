<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/forms.css">
    <link rel="stylesheet" href="../styles/pagina_adm.css">
    
    <script>function mostrarCampoTexto() {
    var pcdSelect = document.getElementById("pcd");
    var campoTexto = document.getElementById("campo_pcd_descricao");

    if (pcdSelect.value === "1") {
        campoTexto.style.display = "block";  // Mostra o campo de texto
    } else {
        campoTexto.style.display = "none";   // Esconde o campo de texto
        document.getElementById("pcd_descricao").value = "";  // Limpa o campo de texto
    }
}</script>
</head>
<body>

    <form action="../../controllers/salvar_dados_capoeira.php" method="post">
        
        <h1>ADICIONAR DADO CAPOEIRA</h1>
        <input type="text" name="nome" placeholder="Nome do Beneficiário">

        <select name="sexo" id="">
            <option value="">Sexo</option>
            <option value="M">M</option>
            <option value="F">F</option>
        </select>

        <label for="">Data de Nascimento</label>
        <input type="date" name="data">
        <select name="pcd" id="pcd" onchange="mostrarCampoTexto()">
            <option value="">PCD</option>
            <option value="1">Sim</option>
            <option value="2">Não</option>
        </select>


        <div id="campo_pcd_descricao" style="display:none;">
            <label for="pcd_descricao">Descreva a condição:</label>
            <input type="text" id="pcd_descricao" name="pcd_descricao" placeholder="Descreva aqui...">
        </div>

        
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
        <? if (isset($_GET['vazio']) && $_GET['vazio'] == 1)  {?>
        <p style="display:flex;color: red; justify-content: center"><?echo 'Não pode ter dados vazios';?></p>
        <?}?>
    </form>

</body>
</html>