<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            -webkit-box-shadow: 2px -1px 39px -3px rgba(0, 0, 0, 0.79);
            -moz-box-shadow: 2px -1px 39px -3px rgba(0, 0, 0, 0.79);
            box-shadow: 2px -1px 39px -3px rgba(0, 0, 0, 0.79);
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: chocolate;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Nombre</th>
            <td><?php echo $_POST["nombre"]; ?></td>
        </tr>
        <tr>
            <th>Matricula</th>
            <td><?php echo $_POST["matricula"]; ?></td>
        </tr>
        <tr>
            <th>TLF</th>
            <td><?php echo $_POST["tlf"]; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $_POST["email"]; ?></td>
        </tr>
        <tr>
            <th>Marca</th>
            <td><?php echo $_POST["marca"];

                ?></td>
        </tr>
        <tr>
            <th>Seguro</th>
            <td><?php echo $_POST["seguro"]; ?></td>
        </tr>
        <tr>
            <th>Horario de Llamada</th>
            <td>
                <?php
                for ($i = 1; $i < 4; $i++) {
                    if (isset($_POST["c$i"])) {
                        echo $_POST["c$i"];
                        echo "<br>";
                    }
                }
                ?>
            </td>
        </tr>
    </table>
</body>

</html>