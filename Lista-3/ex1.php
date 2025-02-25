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


    <form method="post" action="">

        <div class="mb-3">
            <label for="V1" class="form-label">Valor 1</label>
            <input type="decimal" id="V1" name="V1" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="V2" class="form-label">Valor 2</label>
            <input type="decimal" id="V2" name="V2" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="V3" class="form-label">Valor 3</label>
            <input type="decimal" id="V3" name="V3" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="V4" class="form-label">Valor 4</label>
            <input type="decimal" id="V4" name="V4" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="V5" class="form-label">Valor 5</label>
            <input type="decimal" id="V5" name="V5" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="V6" class="form-label">Valor 6</label>
            <input type="decimal" id="V6" name="V6" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="V7" class="form-label">Valor 7</label>
            <input type="decimal" id="V7" name="V7" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <?php
    /*
Escreva um programa que leia 7 números diferentes, imprima o menor 
valor e imprima a posição do menor valor na sequência de entrada.
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $v1 = $_POST['V1'];
            $v1p = "V1";
            $v2 = $_POST['V2'];
            $v2p = "V2";
            $v3 = $_POST['V3'];
            $v3p = "V3";
            $v4 = $_POST['V4'];
            $v4p = "V4";
            $v5 = $_POST['V5'];
            $v5p = "V5";
            $v6 = $_POST['V6'];
            $v6p = "V6";
            $v7 = $_POST['V7'];
            $v7p = "V7";

            $exitCon = 0;
            $menorV = $v1;
            while ($exitCon <= 7) {
                $exitCon += 1;
                if ($menorV > ${"v" . $exitCon}) {
                    $menorV = ${"v" . $exitCon};
                    $menorP = "V" . $exitCon;
                }
            }


            echo "Valor = $menorV\tPosição = $menorP";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>