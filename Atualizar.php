<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $id = isset($_GET["codigo"]) ? $_GET["codigo"] : " ";
        $nome = isset($_GET["nome"]) ? $_GET["nome"] : " ";
        $sexo = $_GET["sexo"];
        $cpf = $_GET["cpf"];
        $dataNascimento = $_GET["dataNascimento"];
        $email = $_GET["email"];
        $celular = $_GET["celular"];
        $profissao = $_GET["profissao"];

        $servername = "107.180.57.185";
        $username = "dz_dev";
        $password = "p?%3DY?#*LBW";
        $dbname = "dz_dev_test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE MulheresAdultas SET nome = '" . $nome . "', sexo = '" . $sexo .
                "', cpf = '" . $cpf . "', dataNascimento = '" . $dataNascimento . "', " . "', email = '" . $email .
                "', celular = '" . $celular . "', " . "', profissao = '" . $profissao .
                "WHERE id = " . $id . ";";

        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
        header("Location: listar.php");
        ?>
    </body>
</html>
