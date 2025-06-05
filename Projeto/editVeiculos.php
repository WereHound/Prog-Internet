<?php
require_once("header.php");
?>

<?php
require_once("database.php");


try {

    $stmt = $pdo->prepare("SELECT CPF FROM cliente");
    $stmt->execute();

    $clientesCPF = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Placa"])) {
    $Placa = $_GET["Placa"];

    $stmt = $pdo->prepare("SELECT * FROM veiculo WHERE Placa = ?");
    $stmt->execute([$Placa]);
    $veiculo = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Placa = $_POST["Placa"];
    $Marca = $_POST["Marca"];
    $Modelo = $_POST["Modelo"];
    $Cor = $_POST["Cor"];
    $Cliente_CPF = $_POST["Cliente_CPF"];

    try {

        $stmt = $pdo->prepare("UPDATE veiculo SET Marca = ?, Modelo = ?, Cor = ?, Cliente_CPF = ? WHERE Placa = ?");
        $stmt->execute([$Marca, $Modelo, $Cor, $Cliente_CPF, $Placa]);

        header("Location: veiculos.php");
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
    <title>Editar Veiculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Veiculo</h2>

        <form method="POST" action="">
            <input type="hidden" name="Placa" value="<?php echo htmlspecialchars($Placa); ?>">

            <div class="mb-3">
                <label for="Marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="Marca" name="Marca"
                    value="<?php echo htmlspecialchars($veiculo['Marca']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="Modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="Modelo" name="Modelo"
                    value="<?php echo htmlspecialchars($veiculo['Modelo']); ?>">
            </div>

            <div class="mb-3">
                <label for="Cor" class="form-label">Cor</label>
                <input type="text" class="form-control" id="Cor" name="Cor"
                    value="<?php echo htmlspecialchars($veiculo['Cor']); ?>">
            </div>

            <div class="mb-3">

                <label for="Cliente_CPF" class="form-label">Cliente_CPF</label>
                <select name="Cliente_CPF">
                    <?php foreach ($clientesCPF as $CPF): ?>

                        <option <?php if($CPF["CPF"] == $veiculo["Cliente_CPF"]) echo "selected";?> value="<?php echo htmlspecialchars($CPF['CPF']); ?>">
                            <?php echo htmlspecialchars($CPF['CPF']); ?></option>

                    <?php endforeach; ?>
                </select>

            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="veiculos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>