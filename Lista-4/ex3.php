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
            <label for="V1" class="form-label">Palavra 1</label>
            <input type="text" id="V1" name="V1" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="V2" class="form-label">Palavra 2</label>
            <input type="text" id="V2" name="V2" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <?php
    /*
Crie um programa em PHP em que sejam lidas duas palavras, e verifique se a segunda palavra 
está contida na primeira.
    */

    function logic($v1, $v2)
    {
        $counter = 0;
        for ($i = 0; $i < strlen($v1); $i++) {
            if ($v1[$i] == $v2[$counter] && $counter < strlen($v2)) {
                $counter++;
            } else {
                $counter = 0;
            }
            if ($counter == strlen($v2)) {
                echo "A segunda palavra está contida na primeira.";
                return;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $v1 = $_POST['V1'];
            $v2 = $_POST['V2'];
            logic($v1, $v2);

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