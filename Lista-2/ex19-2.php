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
            <label for="V1" class="form-label">Dias</label>
            <input type="decimal" id="V1" name="V1" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {

            $dias = $_POST['V1'];
            $horas = $dias * 24;
            $minutos = $horas * 60;
            $segundos = $minutos * 60;

            $horasFinal = floor($segundos / 3600);
            $resto = $segundos % 3600;
            $minutosFinal = floor($resto / 60);
            $resto = $resto % 60;
            $segundosFinal = $resto;
            echo "Horas: " . $horasFinal . "\tMinutos: " . $minutosFinal . "\tSegundos: " . $segundosFinal;



            $seconds = $dias * 24 * 60 * 60;
            $finalHours = 0;
            $finalMinutes = 0;

            while ($seconds >= 3600) {
                $seconds -= 3600;
                $finalHours += 1;
            }
            while ($seconds >= 60) {
                $seconds -= 60;
                $finalMinutes += 1;
            }

            $seconds = round($seconds, 2);

            echo "\nHours: " . $finalHours . "\tMinutes: " . $finalMinutes . "\tSeconds: " . $seconds;


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