<?php
require_once("header.php");
?>

<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Username"])) {
    $Username = $_GET["Username"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE Username = ?");
    $stmt->execute([$Username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {




    $Username = $_POST['Username'];
    $oldPassword = $_POST['oldPassword'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE Username = ?");
    $stmt->execute([$Username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($oldPassword, $user["Password"])) {

        $newPassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
        $Email = $_POST["Email"];

        try {

            $stmt = $pdo->prepare("UPDATE users SET Password = ?, Email = ? WHERE Username = ?");
            $stmt->execute([$newPassword, $Email, $Username]);

            header("Location: main.php");
            exit;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    } else {
        echo "<div class='alert alert-danger'>Senha Invalida</div>";

    }




}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Usuario</h2>

        <form method="POST" action="">
            <input type="hidden" name="Username" value="<?php echo htmlspecialchars($Username); ?>">

            <div class="mb-3">
                <label for="newPassword" class="form-label">Senha nova</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>

            <div class="mb-3">
                <label for="oldPassword" class="form-label">Senha antiga</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control" id="Email" name="Email"
                    value="<?php echo htmlspecialchars($user['Email']); ?>">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="main.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>