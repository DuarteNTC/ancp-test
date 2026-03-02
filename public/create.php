<?php

require_once "../config/database.php";
require_once "../models/Animal.php";

$database = new Database();
$db = $database->getConnection();

$animal = new Animal($db);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $serie = $_POST["serie"];
    $rgn = $_POST["rgn"];
    $sexo = $_POST["sexo"];
    $dt_nasc = $_POST["dt_nasc"];

    if ($animal->create($nome, $serie, $rgn, $sexo, $dt_nasc)) {
        header("Location: index.php?sucesso=1");
        exit;
    } else {
        echo "Erro ao cadastrar.";
    }
}
?>

<h2>Cadastrar Animal</h2>

<form method="POST">

    <label>Nome:</label><br>
    <input type="text" name="nome" required maxlength="24"><br><br>

    <label>Série:</label><br>
    <input type="text" name="serie" required maxlength="4"><br><br>

    <label>RGN:</label><br>
    <input type="text" name="rgn" required maxlength="16"><br><br>

    <label>Sexo:</label><br>
    <select name="sexo" required>
        <option value="">Selecione</option>
        <option value="1">Macho</option>
        <option value="2">Fêmea</option>
    </select><br><br>

    <label>Data de Nascimento:</label><br>
    <input type="date" name="dt_nasc" required><br><br>

    <button type="submit">Salvar</button>

</form>

<br>
<a href="index.php">Voltar</a>