<?php
require_once("header.php");
?>

<?php
require_once("database.php");

try {

    $stmt = $pdo->prepare("SELECT Placa FROM veiculo");
    $stmt->execute();

    $PlacaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

if (isset($_FILES["image"])) {
    $curl = curl_init();
    $cfile = new CURLFile($_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name']);

    curl_setopt_array($curl, [
        CURLOPT_URL => "http://192.168.4.201/Projeto/upload_endpoint.php", //change if its a different IP
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => ['image' => $cfile],
        CURLOPT_RETURNTRANSFER => true,
    ]);

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        echo "cURL Error: " . curl_error($curl);
    } else {
        echo "Remote response: " . $response;
    }

    curl_close($curl);
} else {
    echo "No file uploaded.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $Nome_Da_Foto = $_POST['Nome_Da_Foto'];
        $Caminho_Da_Foto = '192.168.4.201/Projeto/uploads/' . $_FILES['image']['name']; //change if its a different IP
        $Placa = $_POST['Placa'];

        $stmt = $pdo->prepare("INSERT INTO foto (Nome_Da_Foto, Caminho_Da_Foto, Placa) VALUES (?, ?, ?)");
        if ($stmt->execute([$Nome_Da_Foto, $Caminho_Da_Foto, $Placa])) {
            header("Location: fotos.php");
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
    <title>Nova Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Nova Foto</h2>
        <form action="newFoto.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="Nome_Da_Foto" class="form-label">Nome Da Foto</label>
                <input type="text" id="Nome_Da_Foto" name="Nome_Da_Foto" class="form-control"
                    placeholder="Um Dia Ensolarado" required>
            </div>

            <div class="mb-3">

                <label for="Placa" class="form-label">Placa</label>
                <select name="Placa">
                    <?php foreach ($PlacaList as $PlacaItem): ?>

                        <option value="<?php echo htmlspecialchars($PlacaItem['Placa']); ?>">
                            <?php echo htmlspecialchars($PlacaItem['Placa']); ?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Select an image to upload:</label>
                <input type="file" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="fotos.php" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>