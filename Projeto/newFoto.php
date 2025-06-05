<?php
require_once("header.php");
?>

<?php
require_once("database.php");

if (isset($_FILES["image"]))
{
$curl = curl_init();
$cfile = new CURLFile($_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name']);

curl_setopt_array($curl, [
CURLOPT_URL => "http://192.168.145.103/Projeto/upload_endpoint.php",
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => ['image' => $cfile],
CURLOPT_RETURNTRANSFER => true,
]);

$response = curl_exec($curl);
if (curl_errno($curl))
{
    echo "cURL Error: " . curl_error($curl);
}
else
{
    echo "Remote response: " . $response;
}

curl_close($curl);
} 
else
{
    echo "No file uploaded.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $NomeDaFoto = $_POST['NomeDaFoto'];
        $CaminhoDaFoto = '192.168.145.103/Projeto/uploads/'.$_POST['NomeDaFoto'];


            $stmt = $pdo->prepare("INSERT INTO Foto (NomeDaFoto, CaminhoDaFoto) VALUES (?, ?)");
            if ($stmt->execute([$NomeDaFoto, $CaminhoDaFoto])) {
                       
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
                <label for="NomeDaFoto" class="form-label">NomeDaFoto</label>
                <input type="text" id="NomeDaFoto" name="NomeDaFoto" class="form-control" placeholder="UmDiaEnsolarado" required>
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