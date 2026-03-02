<?php

require_once "../config/database.php";
require_once "../models/Animal.php";

$database = new Database();
$db = $database->getConnection();

$animal = new Animal($db);

// Verifica se filtro foi ativado
$onlyOlderThanTwo = isset($_GET["filtro"]) && $_GET["filtro"] === "2anos";

$stmt = $animal->read($onlyOlderThanTwo);

?>

<h2>Lista de Animais</h2>

<a href="create.php">Cadastrar Novo</a> |
<a href="index.php">Todos</a> |
<a href="index.php?filtro=2anos">Mais de 2 anos</a>

<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>Nome</th>
        <th>Série</th>
        <th>RGN</th>
        <th>Sexo</th>
        <th>Data Nasc.</th>
        <th>Idade</th>
        <th>Data Cadastro</th>
    </tr>

<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

<tr>
    <td><?= htmlspecialchars($row["nome"]) ?></td>
    <td><?= htmlspecialchars($row["serie"]) ?></td>
    <td><?= htmlspecialchars($row["rgn"]) ?></td>
    <td><?= $row["sexo"] == 1 ? "Macho" : "Fêmea" ?></td>
    <td><?= $row["dt_nasc"] ?></td>
    <td><?= $row["idade"] ?> anos</td>
    <td><?= $row["created_at"] ?></td>
</tr>

<?php endwhile; ?>

</table>