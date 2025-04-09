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


    <form method="post" action="" class="m-5">

        <div class="row">
            <div class="col">
                <label for="Nome1">Nome</label>
                <input type="text" id="Nome1" name="Nome1" class="form-control" placeholder="Mark">
            </div>

            <div class="col">
                <label for="Numero1">Número de telefone</label>
                <input type="text" id="Numero1" name="Numero1" class="form-control" placeholder="1999-1999">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Nome2">Nome</label>
                <input type="text" id="Nome2" name="Nome2" class="form-control" placeholder="Mark">
            </div>

            <div class="col">
                <label for="Numero2">Número de telefone</label>
                <input type="text" id="Numero2" name="Numero2" class="form-control" placeholder="1999-1999">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Nome3">Nome</label>
                <input type="text" id="Nome3" name="Nome3" class="form-control" placeholder="Mark">
            </div>

            <div class="col">
                <label for="Numero3">Número de telefone</label>
                <input type="text" id="Numero3" name="Numero3" class="form-control" placeholder="1999-1999">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Nome4">Nome</label>
                <input type="text" id="Nome4" name="Nome4" class="form-control" placeholder="Mark">
            </div>

            <div class="col">
                <label for="Numero4">Número de telefone</label>
                <input type="text" id="Numero4" name="Numero4" class="form-control" placeholder="1999-1999">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Nome5">Nome</label>
                <input type="text" id="Nome5" name="Nome5" class="form-control" placeholder="Mark">
            </div>

            <div class="col">
                <label for="Numero5">Número de telefone</label>
                <input type="text" id="Numero5" name="Numero5" class="form-control" placeholder="1999-1999">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <?php
    /*
Crie um formulário que leia dados de 5 contatos: nome e número de 
telefone. Leia os dados e crie um mapa ordenado onde as chaves são os 
nomes dos contatos e os valores são os números de telefone. Verifique se 
há duplicatas de nome ou número de telefone antes de adicionar um novo 
contato. Exiba a lista ordenada pelos nomes dos contatos.
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $array = [];
            for ($i = 1; $i <= 5; $i++) {

                ${"item" . $i} = ["Chave" => $_POST['Nome' . $i], "Valor" => $_POST['Numero' . $i]];

                $counter = 0;
                foreach ($array as $value) {
                    if (($value["Chave"] == ${"item" . $i}["Chave"]) or ($value["Valor"] == ${"item" . $i}["Valor"]))
                        $counter++;
                }

                if ($counter == 0)
                    $array[] = ${"item" . $i};


            }

            sort($array, SORT_REGULAR);


            foreach ($array as $value) {
                echo "Chave = " . $value["Chave"] . "\tValor = " . $value["Valor"] . "\n";
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