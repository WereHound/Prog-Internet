<?php
require_once("header.php");
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT idServico FROM servico");
    $stmt->execute();

    $servicosidServico = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

try {

    $stmt = $pdo->prepare("SELECT Placa FROM veiculo");
    $stmt->execute();

    $veiculosPlaca = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    $Data_de_Entrega_do_Veiculo = $_POST["Data_de_Entrega_do_Veiculo"];
    $Data_de_Devolucao_do_Veiculo = $_POST["Data_de_Devolucao_do_Veiculo"];
    $Servico_idServico = $_POST["Servico_idServico"];
    $Veiculo_Placa = $_POST["Veiculo_Placa"];

    try {

        $stmt = $pdo->prepare("UPDATE `ordem de servico` SET Data_de_Entrega_do_Veiculo = ?, Data_de_Devolucao_do_Veiculo = ?, Servico_idServico = ?, Veiculo_Placa = ?  WHERE idOrdem = ?");
        $stmt->execute([$Data_de_Entrega_do_Veiculo, $Data_de_Devolucao_do_Veiculo, $Servico_idServico, $Veiculo_Placa, $idOrdem]);

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
                <label for="Data_de_Entrega_do_Veiculo" class="form-label">Data_de_Entrega_do_Veiculo</label>
                <input type="date" class="form-control" id="Data_de_Entrega_do_Veiculo" name="Data_de_Entrega_do_Veiculo"
                    value="<?php echo htmlspecialchars($ordem['Data_de_Entrega_do_Veiculo']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="Data_de_Devolucao_do_Veiculo" class="form-label">Data_de_Devolucao_do_Veiculo</label>
                <input type="date" class="form-control" id="Data_de_Devolucao_do_Veiculo" name="Data_de_Devolucao_do_Veiculo"
                    value="<?php echo htmlspecialchars($ordem['Data_de_Devolucao_do_Veiculo']); ?>">
            </div>

            <div class="mb-3">

                <label for="Servico_idServico" class="form-label">Servico_idServico</label>
                <select name="Servico_idServico">
                    <?php foreach ($servicosidServico as $idServico): ?>

                        <option <?php if($idServico["idServico"] == $ordem["Servico_idServico"]) echo "selected";?> value="<?php echo htmlspecialchars($idServico['idServico']); ?>">
                            <?php echo htmlspecialchars($idServico['idServico']); ?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>
            
            <div class="mb-3">

                <label for="Veiculo_Placa" class="form-label">Veiculo_Placa</label>
                <select name="Veiculo_Placa">
                    <?php foreach ($veiculosPlaca as $Placa): ?>

                        <option <?php if($Placa["Placa"] == $ordem["Veiculo_Placa"]) echo "selected";?> value="<?php echo htmlspecialchars($Placa['Placa']); ?>">
                            <?php echo htmlspecialchars($Placa['Placa']); ?>
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
