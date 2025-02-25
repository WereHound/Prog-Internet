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
            <label for="V1" class="form-label">Palavra</label>
            <input type="text" id="V1" name="V1" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <?php
    /*
Crie um formulário que leia dados de 5 livros: título e quantidade em 
estoque. Leia os dados e crie um mapa ordenado onde as chaves são os 
títulos dos livros e os valores são a quantidade em estoque. Verifique se a 
quantidade em estoque é inferior a 5 e exiba um alerta para os livros com 
baixa quantidade. Exiba a lista ordenada pelo título dos livros.
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $v1 = $_POST['V1'];

            $count = 0;
            foreach ($v1 as $i) {
                $count++;
            }


            echo "Número de caracteres = " . $count;
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