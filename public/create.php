<?php

require_once "../config/database.php";
require_once "../models/Animal.php";

$database = new Database();
$db = $database->getConnection();

$animal = new Animal($db);

$nome = '';
$serie = '';
$rgn = '';
$sexo = '';
$dt_nasc = '';
$erros = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? '');
    $serie = strtoupper(trim($_POST["serie"] ?? ''));
    $rgn = trim($_POST["rgn"] ?? '');
    $sexo = $_POST["sexo"] ?? '';
    $dt_nasc = $_POST["dt_nasc"] ?? '';

    // ===== Validações =====

    if (empty($nome)) {
        $erros[] = "Nome é obrigatório.";
    } elseif (strlen($nome) > 24) {
        $erros[] = "Nome deve ter no máximo 24 caracteres.";
    }

    if (!preg_match('/^[A-Z]{4}$/', $serie)) {
        $erros[] = "Série deve conter exatamente 4 letras maiúsculas.";
    }

    if (empty($rgn)) {
        $erros[] = "RGN é obrigatório.";
    } elseif (strlen($rgn) > 16) {
        $erros[] = "RGN deve ter no máximo 16 caracteres.";
    }

    if ($sexo != 1 && $sexo != 2) {
        $erros[] = "Sexo inválido.";
    }

    if (empty($dt_nasc)) {
        $erros[] = "Data de nascimento é obrigatória.";
    } elseif ($dt_nasc > date('Y-m-d')) {
        $erros[] = "Data de nascimento não pode ser futura.";
    }

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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Animal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow-sm">
                <div class="card-body">

                    <h3 class="card-title mb-4 text-center">
                        Cadastro de Animal
                    </h3>

                    <!-- Exibição de erros -->
                    <?php if (!empty($erros)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($erros as $erro): ?>
                                    <li><?= htmlspecialchars($erro) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text"
                                   name="nome"
                                   class="form-control"
                                   value="<?= htmlspecialchars($nome) ?>"
                                   maxlength="24"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Série</label>
                            <input type="text"
                                   name="serie"
                                   class="form-control text-uppercase"
                                   value="<?= htmlspecialchars($serie) ?>"
                                   maxlength="4"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">RGN</label>
                            <input type="text"
                                   name="rgn"
                                   class="form-control"
                                   value="<?= htmlspecialchars($rgn) ?>"
                                   maxlength="16"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="sexo" class="form-select" required>
                                <option value="">Selecione</option>
                                <option value="1" <?= $sexo == 1 ? 'selected' : '' ?>>
                                    Macho
                                </option>
                                <option value="2" <?= $sexo == 2 ? 'selected' : '' ?>>
                                    Fêmea
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Data de Nascimento</label>
                            <input type="date"
                                   name="dt_nasc"
                                   class="form-control"
                                   value="<?= htmlspecialchars($dt_nasc) ?>"
                                   required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">
                                Voltar
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Cadastrar
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>