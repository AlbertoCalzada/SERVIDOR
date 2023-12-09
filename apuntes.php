<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuntes php</title>
    <style>
        h3 {
            color: red;
        }

        p {
            width: 50%;
        }

        pre {
            border: solid 1px black;
            padding: 3%;
            width: fit-content;
            height: fit-content;
            margin: 5%;
        }
    </style>
</head>

<body>
    <h1>Apuntes PHP: Servidor</h1>
    <div class="taller">
        <h3>Formulario Taller</h3>
        <p> - <b>Action</b>: Envía datos a la página pasada por este atributo</p>
        <form action="./apuntes.php" method="post">
            <p> - <b>POST</b>: Envía los datos sin mostrarlos en la cabecera del navegador
            <p>
        </form>
        <form action="./apuntes.php" method="get">
            <p> - <b>GET</b>: Envía los datos y los muestra en la cabecera del navegador</p>
        </form>
        <form action="./apuntes.php" method="post">
            <label for="nombreParaFront">
                <p> - <b>Label</b>: Sirve para asociar una descripción a input, obligatorio para el responsive</p>
                <p> - <b>Name</b>: Atributo de input, necesario para asociarlo a los datos enviados por GET/POST</p>
                <p> - <b>Id</b>: Atributo necesario para las clases en css o por ejemplo, para asociarlo al label y al js</p>
                <p> - <b>Placeholder</b>: Atributo obligatorio para dar información de formato de lo que quieres
                    que te pasen en el input</p>
                <p> - <b>Required</b>: Atributo opcional según si quieres que el dato sea obligatorio antes de enviar
                    dicho formulario o no</p>
            </label>
            <input type="text" name="nombreParaMetodo" id="nombreParaFront" placeholder="Obligatorio" required>
            <label for="number">
                <p> - <b>Input:number</b>: Obligatorio poner este input en vez de text, si el dato que se va
                    introducir es solo númerico, por ejemplo la edad</p>
            </label>
            <input type="number" name="number" id="number">
            <label for="submit">
                <p> - <b>Input</b>:submit: Input de tipo botón, obligatorio para enviar los datos, no es recomendable,
                    pero se puede sustituir por un button type="submit"</p>
                <p> - <b>Value</b>: atribut de input:submit es el texto dentro del botón,
                    si no se pone se pondra el valor "enviar" en el idioma de tu navegador</p>
            </label>
            <input type="submit" value="Enviar">
            <input type="submit">
            <button type="submit">Enviar button no input</button>
        </form>
    </div>

    <div class="rubio">
        <h3>Cuadernillo rubio</h3>
        <p>Para este ejercicio tenemos que tener en cuenta como recibir datos,
            guardarlos en variables, mostrarlos y en algunos casos retrocederlos</p>
        <p>Para recibir datos de una página con un formulario se hace de la siguiente forma: </p>
        <ul>
            <li>Para recoger datos del método Post: $_POST["name"]</li>
            <li>Para recoger datos del método Get: $_GET["name"]</li>
            <li>Para recoger datos del cualquier método: $_REQUEST["name"]</li>
        </ul>
        <p>Para guardarlo en una variable por ejemplo con le método POST, creamos la variable con un dolar
            y le asignamos el valor del $_POST["name"]</p>
        <p> Ejemplo: $varName = $_POST["name"];</p>
        <p>Para mostrar datos en php, usamos (echo), para concatenar utilizamos el punto o podemos introducer
            nombres de variables dentro de las comillas dobles que forman un string</p>
        <h4><b>Enviar datos hacia detras</b></h4>
        <p>Para enviar datos hacia detras podemos usar el type hidden de input y lo enviamos a través del value</p>
        <form action="./apuntes.php" method="post">
            <input type="hidden" name="devolver" value="DatoADevolver">
            <p>
                < input type="hidden" name="devolver" value="DatoADevolver">
            </p>
        </form>
    </div>

    <div class="csv">
        <h3>Ficheros csv: Agenda, taller</h3>
        <h4>Para escribir</h4>
        <p>Para escribir hacemos función de fwrite</p>
        <pre>
            $fd = fopen("pathName", "w/a");
            fwrite("linea de ej", $fd);
            fclose(fd);
        </pre>
        <h4>Parte Leer</h4>
        <p>Para csv tenemos que leer el fichero(fgets), guardarlo(explode) y mostrarlo(echo).</p>
        <p>Primero creamos una variable donde abrimos el archivo pasandole, el path y el modo</p>
        <p>El modo puede ser tres tipos</p>
        <ul>
            <li><b>r</b>: Lectura</li>
            <li><b>w</b>: Escritura, pero sobreescribe</li>
            <li><b>a</b>: Escritura, pero no sobreescribe</li>
        </ul>
        <p>Segundo, creamos un bucle con la función fgets, donde en cada iteración guardamos
            de forma separada el archivo</p>
        <p>Tercero lo cerramos y por último lo mostramos con echo usando el contenido de cada array</p>
        <pre>
            <code>
                //Primero
                $fd = fopen("pathName", "modo");
                //Segundo
                while ($linea = fgets($fd)) //En cada iteración hasta que termine el file, guardara una línea en la var
                {
                    //Hacemos un array por cada columna, donde en cada array guardamos los datos de cada columna
                    $c1 = explode(",", $linea)[0]; //El cero significa primera columna
                    $c2 = explode(",", $linea)[1]; //El uno significa segunda columna
                }
                fclose($fd);
            </code>
        </pre>
    </div>
    <div class="session">
        <h3>Session: Chat</h3>
        <p>Para sesión utilizamos $_SESSION["name"];</p>
        <p>Para poder hacer uso de esto tendremos que iniciar la sesión, luego la tendremos que asignar y ya la
            podremos utilizar</p>
        <p>Las sesiones son como las variables globales.</p>

        <pre>
            //Creamos la sesión
            session_start();
            //Asignamos una sesión con nombre color y le asignamos la cadena "azul"
            $_SESSION["color"] = "azul";
            //Si pasamos a otra página con poner $_SESSION["color"], nos devolvera ese valor, por ejemplo:
            echo $_SESSION["color"]; // out: azul
        </pre>
    </div>
    <div class="json">
        <h3>JSON: contaminación, paises, perros</h3>
        <h4>Crear JSON</h4>
        <pre>
            $obj_json = json_encode($var);
            echo $obj_json;
        </pre>
        <h4>Recoger JSON</h4>
        <pre>
            //Guardamos la dirección url de donde queremos recoger el JSON
            $url = "http://localhost/clsgon/2DAW/servidor/php/ejercicios/agendaJSON/contactos.php";
            //Iniciamos curl con la url del JSON
            $curl = curl_init($url);
            //Seteamos curl con está función y estos atributos siempre.
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            //Sacamos y guardamos el json en una variable
            $json = curl_exec($curl);
            //Cerramos el curl iniciado
            curl_close($curl);

            //Decodificamos el json obtenido del curl
            $contactos = json_decode($json);
            //Para verificar que ha salido bien podemos mostrar el JSON completo con var_dump
            var_dump($contactos);
        </pre>
    </div>
    <div class="cookies">
        <h3>COOKIES: ropa</h3>
        <p>Para crear la cookie utilizamos set_cookie()</p>
        <p>Usaremos tres párametros en dicha función</p>
        <ul>
            <li>Name: Nombre de la cookie, lo usaremos para acceder a su valor más tarde</li>
            <li>Value: Valor que devuelve la cookie</li>
            <li>Expiration: Es la caducidad de la cookie, por ello usamos time(), que devuelve el tiempo actual
                y le sumamos segundos, en el ejemplo, hacemos que la cookie sirva una hora, luego desaparece</li>
        </ul>
        <pre>
                //Primera página
                setcookie("name", "value", time() + 3600)
                //Segunda página
                $_COOKIE["name"];
        </pre>
    </div>
    <div class="mysql">
        <h3>MYSQL: Alumnos</h3>
        <fieldset>
            <legend>Conectarse y creacion bbdd / tablas</legend>
           <pre>
            <code>
                //Teniendo los datos en cfg.ini por ejemplo:
                [database]
                servername = "localhost"
                username = "root"
                password = ""
                $config = parse_ini_file('cfg.ini', true);
                
                // Acceder a los valores
                $servername = $config['database']['servername'];
                $username = $config['database']['username'];
                $password = $config['database']['password'];
                try {
                    $conn = new PDO("mysql:host=$servername", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
                    // Crear la base de datos
                    $nombreBBDD = "alumnos";
                    $sql = "CREATE DATABASE IF NOT EXISTS $nombreBBDD";
                    $conn->exec($sql);
                   
                   
                    // Seleccionar la base de datos recién creada
                    $conn->exec("USE $nombreBBDD");
                   
                    // Crear la tabla 'alumno'
                    $sql = "CREATE TABLE IF NOT EXISTS alumno (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        firstname VARCHAR(30) NOT NULL,
                        lastname VARCHAR(30) NOT NULL
                    )";
                    $conn->exec($sql);
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            </code>
           </pre>
        </fieldset>
        <fieldset>
            <legend>Insertar nuevo dato a la bbdd</legend>
            <pre>
                <code>
                    function Insertar($conn, $firstname, $lastname)
                    {
                        try {

                            $sql = "INSERT INTO alumno (firstname, lastname) VALUES ('$firstname', '$lastname')";
                            $conn->exec($sql);
                            echo "Nuevo registro creado exitosamente";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    }
                </code>
            </pre>
        </fieldset>
        <fieldset>
            <legend>Ver algo de la bbdd</legend>
            <pre>
                <code>
                    try {
                        $sql = "SELECT * FROM TABLA";
                        // use exec() because no results are returned
                        $allProducts = $conn->query($sql);
                    } catch(PDOException $e) {
                        echo $sql . "&lt;br&gt;" . $e->getMessage();
                    }
                </code>
            </pre>
            // ESTO:
                $sql = "SELECT * FROM alumno";
                $stmt = $conn->query($sql);
                $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC); //ESTA PARTE
        </fieldset>
        <fieldset>
            <legend>Exportar a csv</legend>
            <pre>
                <code>
                    function ExportarToCsv($conn)
                    {
                        try {
                            // Select para los datos.
                            $sql = "SELECT * FROM alumno";
                            $stmt = $conn->query($sql);
                            $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (empty($alumnos)) {
                            return "No se encontraron datos para exportar.";
                        }

                        $filename = "mysqlDatos.csv";
                        $file = fopen($filename, "w") or die("No se ha podido crear el archivo csv!");

                        // Escribe la cabecera con los nombres de las columnas
                        $header = array_keys($alumnos[0]);
                        fputcsv($file, $header);

                        // Escribe los datos limpiando los valores para no tener espacios innecesarios
                        foreach ($alumnos as $alumno) {
                            foreach ($alumno as &$value) {
                                $value = trim($value);
                            }
                         fputcsv($file, $alumno);
                        }

                            fclose($file);
                            return "Éxito en la operación";
                        } catch (Exception $e) {
                            return "error: " . $e->getMessage();
                        }
                    }
                </code>
            </pre>
        </fieldset>
    </div>
    <div class="mongo">
        <h3>Mongodb: Agenda</h3>
        <p>Para mongodb necesitamos el puerto 27017, además de iniciar el comando "composer require mongodb/mongodb"
            dentro de cada proyecto que vayamos a comenzar</p>
        <fieldset>
            <legend>Conectar</legend>
            <fieldset>
                <legend>Config.ini</legend>
                <pre>
                    <code>
                        namebd = "agenda"
                        ip = "localhost"
                        port = "27017"
                    </code>
                </pre>
            </fieldset>
            <fieldset>
                <legend>Conexión php</legend>
                <pre>
                    <code>
                        require_once __DIR__.'/../vendor/autoload.php';

                        $config = parse_ini_file("config.ini", true);
                        $namebd = $config["namebd"];
                        $ip = $config["ip"];
                        $port = $config["port"];

                        $client = new MongoDB\Client("mongodb://$ip:$port");
                        $database = $client->$namebd;
                    </code>
                </pre>
            </fieldset>
            <fieldset>
                <legend>Meter un contacto</legend>
                <pre>
                    <code>
                        function insertContact($db, $contact)
                        {
                            $agenda = $db->contacto;
                            $agenda->insertOne($contact);
                        }
                    </code>
                </pre>
            </fieldset>
            <fieldset>
                <legend>Obtener todos los contactos</legend>
                <pre>
                    <code>
                        function getAllContacts($db)
                        {
                            $agenda = $db->contacto->find();
                        
                            foreach($agenda as $contact)
                                $contacts[] = $contact;
                            return $contacts;
                        }
                    </code>
                </pre>
            </fieldset>
            <fieldset>
                <legend>Buscar todos los contactos con un tipo de dato</legend>
                <pre>
                    <code>
                        function getContactAtType($db, $type, $data)
                        {
                            $result = $db->contacto->find([$type => $data]);
                            foreach($result as $r)
                            {
                                if ($r)
                                    $contacts[] = new Contact($r->name, $r->surname, $r->tel);
                            }
                            return $contacts;
                        }
                    </code>
                </pre>
            </fieldset>
        </fieldset>
        <fieldset>

        </fieldset>
    </div>
</body>

</html>