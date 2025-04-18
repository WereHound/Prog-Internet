<?php
require_once("header.php");
echo "<h2>User: " . $_SESSION["username"] . " </h2>";
?>

<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idServico"])) {
    $idServico = $_GET["idServico"];

    $stmt = $pdo->prepare("SELECT * FROM servico WHERE idServico = ?");
    $stmt->execute([$idServico]);
    $servico = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idServico = $_POST["idServico"];
    $Servico = $_POST["Servico"];
    $Descricao = $_POST["Descricao"];

    try {

        $stmt = $pdo->prepare("UPDATE servico SET Servico = ?, Descricao = ? WHERE idServico = ?");
        $stmt->execute([$Servico, $Descricao, $idServico]);

        header("Location: servicos.php");
        exit;
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
    <title>Editar Servico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Servico</h2>

        <form method="POST" action="">
            <input type="hidden" name="idServico" value="<?php echo htmlspecialchars($idServico); ?>">

            <div class="mb-3">
                <label for="Servico" class="form-label">Servico</label>
                <input type="text" class="form-control" id="Servico" name="Servico"
                    value="<?php echo htmlspecialchars($servico['Servico']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="Descricao" class="form-label">Descricao</label>
                <input type="text" class="form-control" id="Descricao" name="Descricao"
                    value="<?php echo htmlspecialchars($servico['Descricao']); ?>">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="servicos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>