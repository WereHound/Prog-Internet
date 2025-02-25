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
            <label for="V1" class="form-label">Valor do mês</label>
            <input type="decimal" id="V1" name="V1" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <?php
    /*
Faça um programa que leia o valor associado a um mês. Exemplo: 1 –
Janeiro, 2 – Fevereiro... Exiba o nome do mês associado = USE SWITCH
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            switch ($_POST['V1']) {
                case '1':

                    echo "Janeiro";
                    break;
                case '2':

                    echo "Fevereiro";
                    break;
                case '3':

                    echo "Março";
                    break;
                case '4':

                    echo "Abril";
                    break;
                case '5':

                    echo "Maio";
                    break;
                case '6':

                    echo "Junho";
                    break;
                case '7':

                    echo "Julho";
                    break;
                case '8':

                    echo "Agosto";
                    break;
                case '9':

                    echo "Setembro";
                    break;
                case '10':

                    echo "Outubro";
                    break;
                case '11':

                    echo "Novembro";
                    break;
                case '12':

                    echo "Dezembro";
                    break;

                default:

                    echo "Valor invalido!";
                    break;
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