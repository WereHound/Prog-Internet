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
            <label for="V1" class="form-label">Valor dia</label>
            <input type="decimal" id="V1" name="V1" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="V2" class="form-label">Valor mês</label>
            <input type="decimal" id="V2" name="V2" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="V3" class="form-label">Valor ano</label>
            <input type="decimal" id="V3" name="V3" class="form-control" required="">
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <?php
    /*
Crie um programa em PHP que leia três valores: dia, mês e ano. Verifique se a data informada 
é válida e apresente a data em formato dd/mm/YYYY.
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $v1 = $_POST['V1'];
            $v2 = $_POST['V2'];
            $v3 = $_POST['V3'];

            if (checkdate($v2, $v1, $v3)) {
                echo "Data informada é válida\t" . $v1 . "/" . $v2 . "/" . $v3;
            } else {
                echo "Data invalida";
            }

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