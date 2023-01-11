<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nome = isset($_GET["nome"]) ? $_GET["nome"] : " ";
        $sexo = $_GET["sexo"];
        $cpf = $_GET["cpf"];
        $dataNascimento = $_GET["dataNascimento"];
        $dataNascimento = date('Y-m-d H:i:s', strtotime($dataNascimento));
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

        $sql = "INSERT INTO MulheresAdultas ( nome, sexo, cpf, dataNascimento, email, celular, profissao)" .
                " VALUES ('" . $nome . "', '" . $sexo . "', '" . $cpf . "', '" . $dataNascimento . "', '" .
                $email . "', '" . $celular . "', '" . $profissao . "')";

        if (mysqli_query($conn, $sql)) {
            echo "Cadastrado com sucesso. Continue no sitema, entrando através do menu.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        $conn->close();
        header("Location: listar.php");
        ?>
    </body>
</html>
