<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicicletas</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <table>
        <?php
        $myfile = fopen("AccidentesBicicletas_2022.csv", "r") or die("Unable to open file!");

        while (!feof($myfile)) {
            $frase = fgets($myfile);
            $arrayFrase = explode(";", $frase);
            if (count($arrayFrase) > 2) {


                echo "<tr>";
                echo "<td>$arrayFrase[1]</td>";
                echo "<td>$arrayFrase[9]</td>";
                echo "<td>$arrayFrase[14]</td>";
                echo "</tr>";
            }
        }
        fclose($myfile);
        ?>
    </table>
</body>


</html>