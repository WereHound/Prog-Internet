<?php
require_once("header.php");
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT idServico FROM servico");
    $stmt->execute();

    $idServicoList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

try {

    $stmt = $pdo->prepare("SELECT Placa FROM veiculo");
    $stmt->execute();

    $PlacaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idOrdem"])) {
    $idOrdem = $_GET["idOrdem"];

    $stmt = $pdo->prepare("SELECT * FROM `ordem de servico` WHERE idOrdem = ?");
    $stmt->execute([$idOrdem]);
    $ordem = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idOrdem = $_POST["idOrdem"];
    $Data_de_Entrada_do_Veiculo = $_POST["Data_de_Entrada_do_Veiculo"];
    $Data_de_Devolucao_do_Veiculo = $_POST["Data_de_Devolucao_do_Veiculo"];
    $idServico = $_POST["idServico"];
    $Placa = $_POST["Placa"];

    try {

        $stmt = $pdo->prepare("UPDATE `ordem de servico` SET Data_de_Entrada_do_Veiculo = ?, Data_de_Devolucao_do_Veiculo = ?, idServico = ?, Placa = ?  WHERE idOrdem = ?");
        $stmt->execute([$Data_de_Entrada_do_Veiculo, $Data_de_Devolucao_do_Veiculo, $idServico, $Placa, $idOrdem]);

        header("Location: ordens.php");
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
    <title>Editar Ordem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Ordem</h2>

        <form method="POST" action="">
            <input type="hidden" name="idOrdem" value="<?php echo htmlspecialchars($idOrdem); ?>">

            <div class="mb-3">
                <label for="Data_de_Entrada_do_Veiculo" class="form-label">Data de Entrada do Veiculo</label>
                <input type="date" class="form-control" id="Data_de_Entrada_do_Veiculo" name="Data_de_Entrada_do_Veiculo"
                    value="<?php echo htmlspecialchars($ordem['Data_de_Entrada_do_Veiculo']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="Data_de_Devolucao_do_Veiculo" class="form-label">Data de Devolucao do Veiculo</label>
                <input type="date" class="form-control" id="Data_de_Devolucao_do_Veiculo" name="Data_de_Devolucao_do_Veiculo"
                    value="<?php echo htmlspecialchars($ordem['Data_de_Devolucao_do_Veiculo']); ?>" required>
            </div>

            <div class="mb-3">

                <label for="idServico" class="form-label">idServico</label>
                <select name="idServico">
                    <?php foreach ($idServicoList as $idServicoItem): ?>

                        <option <?php if($idServicoItem["idServico"] == $ordem["idServico"]) echo "selected";?> value="<?php echo htmlspecialchars($idServicoItem['idServico']); ?>">
                            <?php echo htmlspecialchars($idServicoItem['idServico']); ?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>
            
            <div class="mb-3">

                <label for="Placa" class="form-label">Placa</label>
                <select name="Placa">
                    <?php foreach ($PlacaList as $PlacaItem): ?>

                        <option <?php if($PlacaItem["Placa"] == $ordem["Placa"]) echo "selected";?> value="<?php echo htmlspecialchars($PlacaItem['Placa']); ?>">
                            <?php echo htmlspecialchars($PlacaItem['Placa']); ?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="ordens.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
