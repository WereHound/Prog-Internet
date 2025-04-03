<?php
session_start();
if (!$_SESSION["access"]) {
    header("location: index.php?ans=login_denied");

}
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $Placa = $_POST['Placa'];
        $Marca = $_POST['Marca'];
        $Modelo = $_POST['Modelo'];
        $Cor = $_POST['Cor'];
        $Cliente_CPF = $_POST['Cliente_CPF'];

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM veiculo WHERE Placa = ?");
        $stmt->execute([$Placa]);
        $PlacaExists = $stmt->fetchColumn();

        if ($PlacaExists > 0) {
            echo "<div class='alert alert-danger'>Error: Placa already exists. Please choose another.</div>";
        } else {

            $stmt = $pdo->prepare("INSERT INTO veiculo (Placa, Marca, Modelo, Cor, Cliente_CPF) VALUES (?, ?, ?, ?, ?)");
            if ($stmt->execute([$Placa, $Marca, $Modelo, $Cor, $Cliente_CPF])) {
                header("Location: veiculos.php");
                exit;
            }
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
    <title>Cadastrar Veiculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Cadastrar Veiculo</h2>

        <form method="post" action="">
            <div class="mb-3">
                <label for="Placa" class="form-label">Placa</label>
                <input type="text" id="Placa" name="Placa" class="form-control" placeholder="RIK2A18 / PHL-4506"
                    required>
            </div>

            <div class="mb-3">
                <label for="Marca" class="form-label">Marca</label>
                <input type="text" id="Marca" name="Marca" class="form-control" placeholder="BMW" required>
            </div>

            <div class="mb-3">
                <label for="Modelo" class="form-label">Modelo (Opcional)</label>
                <input type="text" id="Modelo" name="Modelo" class="form-control" placeholder="BMW iX M60">
            </div>

            <div class="mb-3">
                <label for="Cor" class="form-label">Cor</label>
                <input type="text" id="Cor" name="Cor" class="form-control" placeholder="Prata">
            </div>

            <div class="mb-3">

                <label for="Cliente_CPF" class="form-label">Cliente_CPF</label>
                <select name="Cliente_CPF">
                    <?php foreach ($clientesCPF as $CPF): ?>

                        <option value="<?php echo htmlspecialchars($CPF['CPF']); ?>">
                            <?php echo htmlspecialchars($CPF['CPF']); ?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="veiculos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>