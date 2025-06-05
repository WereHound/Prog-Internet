<?php
require_once("header.php");
?>

<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["CPF"])) {
    $CPF = $_GET["CPF"];

    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE CPF = ?");
    $stmt->execute([$CPF]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CPF = $_POST["CPF"];
    $Nome = $_POST["Nome"];
    $Telefone = $_POST["Telefone"];

    try {

        $stmt = $pdo->prepare("UPDATE cliente SET Nome = ?, Telefone = ? WHERE CPF = ?");
        $stmt->execute([$Nome, $Telefone, $CPF]);

        header("Location: clientes.php");
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
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Cliente</h2>

        <form method="POST" action="">
            <input type="hidden" name="CPF" value="<?php echo htmlspecialchars($CPF); ?>">

            <div class="mb-3">
                <label for="Nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="Nome" name="Nome"
                    value="<?php echo htmlspecialchars($cliente['Nome']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="Telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="Telefone" name="Telefone"
                    value="<?php echo htmlspecialchars($cliente['Telefone']); ?>">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="clientes.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
