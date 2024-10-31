<?php
include __DIR__ . "../../DataBase.php";

$table_danca = "danca";

$buscar = isset($_GET['busca']) ? $_GET['busca'] : '';

?>
<?php
if (!empty($buscar)) {
    // Protege contra SQL injection
    $pesquisa = $conn->real_escape_string($buscar);


    $sql_busca = "
        (SELECT nome, cpf FROM $table_danca WHERE nome LIKE '%$pesquisa%' OR cpf LIKE '%$pesquisa%')";

    // Executa a consulta
    $sql_query = $conn->query($sql_busca);

    if ($sql_query && $sql_query->num_rows > 0) {
        // Exibe os resultados
        echo "<table>";
        while ($dados = $sql_query->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($dados['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($dados['cpf']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
}
?>
