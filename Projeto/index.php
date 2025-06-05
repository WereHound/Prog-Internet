<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="position: relative; min-height: 100vh; margin: 0;">
    <div style="
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7QWM0g2b9zXVFVz7GGIbRFbHaCpBm6Hdnjg&s');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -2;
    "></div>

    <div style="
        background-color: rgba(255, 255, 255, 0.8); 
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    "></div>


    <?php
    require_once('database.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $pdo->prepare("SELECT * FROM users WHERE Username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password,$user["Password"])) {
                session_start();
                $_SESSION['username'] = $user["Username"];

                $_SESSION['access'] = true;
                header('location: main.php');
            } else {
                echo "<div class='alert alert-danger'>Invalid username or password.</div>";

            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
            die();

        }
    }


    if (isset($_GET["ans"]) && $_GET["ans"] == "login_denied") {
        echo "<div class='alert alert-danger'>Login needed!</div>";
    }

    ?>






    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-secondary w-100" href="newUser.php">Registrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>