<?php
require_once("header.php");
?>

<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $CPF = $_POST['CPF'];
        $Nome = $_POST['Nome'];
        $Telefone = $_POST['Telefone'];

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM cliente WHERE CPF = ?");
        $stmt->execute([$CPF]);
        $cpfExists = $stmt->fetchColumn();

        if ($cpfExists > 0) {
            echo "<div class='alert alert-danger'>Erro: CPF ja existe!</div>";
        } else {

            $stmt = $pdo->prepare("INSERT INTO cliente (CPF, Nome, Telefone) VALUES (?, ?, ?)");
            if ($stmt->execute([$CPF, $Nome, $Telefone])) {
                header("Location: clientes.php");
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
    <title>Cadastrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Cadastrar Cliente</h2>

        <form method="post" action="">
            <div class="mb-3">
                <label for="CPF" class="form-label">CPF</label>
                <input type="text" id="CPF" name="CPF" class="form-control" placeholder="000.000.000-00" required>
            </div>

            <div class="mb-3">
                <label for="Nome" class="form-label">Nome (Optional)</label>
                <input type="text" id="Nome" name="Nome" class="form-control" placeholder="Gabriel Murakami">
            </div>

            <div class="mb-3">
                <label for="Telefone" class="form-label">Telefone (Optional)</label>
                <input type="text" id="Telefone" name="Telefone" class="form-control" placeholder="+55 (18) 1234-1234">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="clientes.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>