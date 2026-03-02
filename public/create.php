<?php

require_once "../config/database.php";
require_once "../models/Animal.php";

$database = new Database();
$db = $database->getConnection();

$animal = new Animal($db);

$erros = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? '');
    $serie = strtoupper(trim($_POST["serie"] ?? ''));
    $rgn = trim($_POST["rgn"] ?? '');
    $sexo = $_POST["sexo"] ?? '';
    $dt_nasc = $_POST["dt_nasc"] ?? '';


    // ===== Validações =====

    // Nome
    if (empty($nome)) {
        $erros[] = "Nome é obrigatório.";
    } elseif (strlen($nome) > 24) {
        $erros[] = "Nome deve ter no máximo 24 caracteres.";
    }

    // Série (4 letras maiúsculas)
    if (!preg_match('/^[A-Z]{4}$/', $serie)) {
        $erros[] = "Série deve conter exatamente 4 letras maiúsculas.";
    }

    // RGN
    if (empty($rgn)) {
        $erros[] = "RGN é obrigatório.";
    } elseif (strlen($rgn) > 16) {
        $erros[] = "RGN deve ter no máximo 16 caracteres.";
    }

    // Sexo
    if ($sexo != 1 && $sexo != 2) {
        $erros[] = "Sexo inválido.";
    }

    // Data de nascimento
    if (empty($dt_nasc)) {
        $erros[] = "Data de nascimento é obrigatória.";
    } elseif ($dt_nasc > date('Y-m-d')) {
        $erros[] = "Data de nascimento não pode ser futura.";
    }

    // ===== Tratamento =====
    if (empty($erros)) {

        if ($animal->create($nome, $serie, $rgn, $sexo, $dt_nasc)) {
            header("Location: index.php?sucesso=1");
            exit;
        } else {
            $erros[] = "Erro ao cadastrar no banco.";
        }
    }
}

?>

<h2>Cadastrar Animal</h2>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($erros as $erro): ?>
                <li><?= htmlspecialchars($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

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