<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="formularioDiv">
        <form method="post" action="eltaller.php">
            <h2>Datos Personales</h2>
            <div class="form-group">
                <label for="id_nombre">Nombre:</label>
                <input type="text" id="id_nombre" name="nombre" placeholder="Introduce tu nombre">
            </div>

            <div class="form-group">
                <label for="id_matricula">Matricula:</label>
                <input type="text" id="id_matricula" name="matricula" placeholder="Introduce tu matricula">
            </div>

            <div class="form-group">
                <label for="id_tlf">TLF:</label>
                <input type="tel" id="id_tlf" name="tlf" placeholder="Introduce tu telefono">
            </div>

            <div class="form-group">
                <label for="id_email">Email:</label>
                <input type="email" id="id_email" name="email" placeholder="Introduce tu email">
            </div>

            <h3>Automóvil</h3>
            <div class="form-group">
                <label for="id_marca">Marca:</label>
                <select id="id_marca" name="marca">
                    <?php
                    $myfile = fopen("coches.csv", "r") or die("Unable to open file!");

                    while (!feof($myfile)) {
                        $frase = fgets($myfile) . "<br>";
                        $arrayFrase = explode(",", $frase);

                        if (count($arrayFrase) == 2) {
                            echo "<option value='" . $arrayFrase[1] . "'>" . $arrayFrase[0] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <h3>Seguro</h3>
                <label for="id_seguro1">Si usa seguro</label>
                <input type="radio" name="seguro" id="id_seguro1" value="Si">
                <label for="id_seguro2">No usa seguro</label>
                <input type="radio" name="seguro" id="id_seguro2" value="No">
            </div>

            
            <div class="form-group">
                <label for="id_horadellamada"><h3>Horario de Llamada</h3></label>
                <br>
                <input type="checkbox" id="id_horadellamada1" name="c1" value="Mañana">
                <label for="id_horadellamada1">Mañana</label><br>
                <input type="checkbox" id="id_horadellamada2" name="c2" value="Tarde">
                <label for="id_horadellamada2">Tarde</label><br>
                <input type="checkbox" id="id_horadellamada3" name="c3" value="Noche">
                <label for="id_horadellamada3">Noche</label><br><br>
            </div>

            <div class="form-group">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>

</html>