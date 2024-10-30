<?php

include 'header.php';


$db = new SQLite3('banco.db');
$results = $db->query("SELECT * FROM estagios");

echo "<section class='section'>";
echo "<div class='container'>";
echo "<h2 class='title has-text-centered'>Lista de Estágios</h2>";

echo "<table class='table is-striped is-hoverable is-fullwidth'>";
echo "<thead><tr><th>Empresa</th><th>Funcionário</th><th>Data</th><th>Horário</th><th>Ações</th></tr></thead>";
echo "<tbody>";

while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['empresa']) . "</td>";
    echo "<td>" . htmlspecialchars($row['funcionario']) . "</td>";
    echo "<td>" . htmlspecialchars($row['data']) . "</td>";
    echo "<td>" . htmlspecialchars($row['horario']) . "</td>";
    echo "<td><a class='button is-info is-small' href='editar_estagio.php?id={$row['id']}'>Editar</a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";


echo "<div class='has-text-centered'>";
echo "<a class='button is-light' href='conteudo.php'>Voltar para Conteúdo</a>";
echo "</div>";

echo "</div>";
echo "</section>";

$db->close();
include 'footer.php';
?>
