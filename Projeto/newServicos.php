<?php
require_once("header.php");
?>

<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $Servico = $_POST['Servico'];
        $Descricao = $_POST['Descricao'];

            $stmt = $pdo->prepare("INSERT INTO servico (Servico, Descricao) VALUES (?, ?)");
            if ($stmt->execute([$Servico, $Descricao])) {
                header("Location: servicos.php");
                exit;
            }
        
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Servico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Cadastrar Servico</h2>

        <form method="post" action="">

            <div class="mb-3">
                <label for="Servico" class="form-label">Servico</label>
                <input type="text" id="Servico" name="Servico" class="form-control" placeholder="Troca de Pneu"
                    required>
            </div>

            <div class="mb-3">
                <label for="Descricao" class="form-label">Descricao (Optional)</label>
                <input type="text" id="Descricao" name="Descricao" class="form-control" placeholder="">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="servicos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>