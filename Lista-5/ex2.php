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
                <label for="Nome-1">Nome</label>
                <input type="text" id="Nome-1" name="Nome-1" class="form-control" placeholder="Mark">
            </div>
            <div class="col">
                <label for="Nota1-1">Nota 1</label>
                <input type="decimal" id="Nota1-1" name="Nota1-1" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota2-1">Nota 2</label>
                <input type="decimal" id="Nota2-1" name="Nota2-1" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota3-1">Nota 3</label>
                <input type="decimal" id="Nota3-1" name="Nota3-1" class="form-control" placeholder="0-10">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Nome-2">Nome</label>
                <input type="text" id="Nome-2" name="Nome-2" class="form-control" placeholder="Mark">
            </div>
            <div class="col">
                <label for="Nota1-2">Nota 1</label>
                <input type="decimal" id="Nota1-2" name="Nota1-2" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota2-2">Nota 2</label>
                <input type="decimal" id="Nota2-2" name="Nota2-2" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota3-2">Nota 3</label>
                <input type="decimal" id="Nota3-2" name="Nota3-2" class="form-control" placeholder="0-10">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Nome-3">Nome</label>
                <input type="text" id="Nome-3" name="Nome-3" class="form-control" placeholder="Mark">
            </div>
            <div class="col">
                <label for="Nota1-3">Nota 1</label>
                <input type="decimal" id="Nota1-3" name="Nota1-3" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota2-3">Nota 2</label>
                <input type="decimal" id="Nota2-3" name="Nota2-3" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota3-3">Nota 3</label>
                <input type="decimal" id="Nota3-3" name="Nota3-3" class="form-control" placeholder="0-10">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Nome-4">Nome</label>
                <input type="text" id="Nome-4" name="Nome-4" class="form-control" placeholder="Mark">
            </div>
            <div class="col">
                <label for="Nota1-4">Nota 1</label>
                <input type="decimal" id="Nota1-4" name="Nota1-4" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota2-4">Nota 2</label>
                <input type="decimal" id="Nota2-4" name="Nota2-4" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota3-4">Nota 3</label>
                <input type="decimal" id="Nota3-4" name="Nota3-4" class="form-control" placeholder="0-10">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="Nome-5">Nome</label>
                <input type="text" id="Nome-5" name="Nome-5" class="form-control" placeholder="Mark">
            </div>
            <div class="col">
                <label for="Nota1-5">Nota 1</label>
                <input type="decimal" id="Nota1-5" name="Nota1-5" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota2-5">Nota 2</label>
                <input type="decimal" id="Nota2-5" name="Nota2-5" class="form-control" placeholder="0-10">
            </div>
            <div class="col">
                <label for="Nota3-5">Nota 3</label>
                <input type="decimal" id="Nota3-5" name="Nota3-5" class="form-control" placeholder="0-10">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>


    <?php
    /*
Crie um formulário que leia dados de 5 alunos: nome e três notas. Leia os 
dados e crie um mapa ordenado onde as chaves são os nomes dos alunos 
e os valores são as médias das notas. Exiba a lista de alunos ordenada pela 
média das notas (do maior para o menor).
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {


            $array = [];
            for ($i = 1; $i <= 5; $i++) {

                ${"item" . $i} = ["Chave" => $_POST['Nome-' . $i], "Valor" => (($_POST['Nota1-' . $i] + $_POST['Nota2-' . $i] + $_POST['Nota3-' . $i]) / 3)];
                $array[] = ${"item" . $i};
            }


            $notas = [];

            foreach ($array as $value) {
                $notas[] = $value["Valor"];
            }

            sort($notas);

            array_multisort($notas, SORT_DESC, $array);




            foreach ($array as $value) {
                echo "Chave = " . $value["Chave"] . "\tValor = " . $value["Valor"] . "</br>";
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