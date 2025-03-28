<?php

require_once("database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $user = $_POST['User'];
        $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
        $email = $_POST['Email'];
        $stmt = $pdo->prepare("INSERT INTO users (Username, Password, Email) VALUES (?, ?, ?)");
        if ($stmt->execute([$user, $password, $email])) {
            header("location: index.php");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <h1>Register</h1>

        <form method="post" action="" class="m-5">

            <div class="row">
                <div class="col">
                    <label for="User">User</label>
                    <input type="text" id="User" name="User" class="form-control" placeholder="" required>
                </div>
                <div class="col">
                    <label for="Password">Password</label>
                    <input type="password" id="Password" name="Password" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="Email">Email (Optional)</label>
                    <input type="text" id="Email" name="Email" class="form-control" placeholder="">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>