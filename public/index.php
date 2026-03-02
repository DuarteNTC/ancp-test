<?php

require_once "../config/database.php";
require_once "../models/Animal.php";

$database = new Database();
$db = $database->getConnection();

$animal = new Animal($db);

// Verifica filtro
$onlyOlderThanTwo = isset($_GET["filtro"]) && $_GET["filtro"] === "2anos";

$stmt = $animal->read($onlyOlderThanTwo);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Animais</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="mb-4">Lista de Animais</h2>

            <!-- Mensagem de sucesso -->
            <?php if (isset($_GET['sucesso'])): ?>
                <div class="alert alert-success">
                    Animal cadastrado com sucesso!
                </div>
            <?php endif; ?>

            <!-- Botões -->
            <div class="mb-3">
                <a href="create.php" class="btn btn-primary">Cadastrar Novo</a>
                <a href="index.php" class="btn btn-secondary">Todos</a>
                <a href="index.php?filtro=2anos" class="btn btn-warning">
                    Mais de 2 anos
                </a>
            </div>

            <!-- Tabela -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Série</th>
                            <th>RGN</th>
                            <th>Sexo</th>
                            <th>Data Nasc.</th>
                            <th>Idade</th>
                            <th>Data Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if ($stmt->rowCount() > 0): ?>
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td><?= htmlspecialchars($row["nome"]) ?></td>
                                <td><?= htmlspecialchars($row["serie"]) ?></td>
                                <td><?= htmlspecialchars($row["rgn"]) ?></td>
                                <td>
                                    <?= $row["sexo"] == 1 ? "Macho" : "Fêmea" ?>
                                </td>
                                <td><?= date("d/m/Y", strtotime($row["dt_nasc"])) ?></td>
                                <td><?= $row["idade"] ?> anos</td>
                                <td><?= date("d/m/Y H:i", strtotime($row["created_at"])) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Nenhum animal cadastrado.
                            </td>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>