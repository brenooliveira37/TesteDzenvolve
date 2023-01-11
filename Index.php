<!DOCTYPE html>
<html>
    <head>
        <title>Teste Dzenvolve</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="index.php">Pagina Inicial</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar.html">Cadastrar </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Listar </a>
                    </li>
                </ul>
            </div>  
        </nav>
        <?php
//        $servername = "107.180.57.185";
//        $username = "dz_dev";
//        $password = "p?%3DY?#*LBW";
//        $dbname = "dz_dev_test";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dz_dev_test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "CREATE TABLE IF NOT EXISTS MulheresAdultas (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(30) NOT NULL,
sexo VARCHAR(30),
cpf VARCHAR(30) NOT NULL,
dataNascimento DATETIME,
email VARCHAR(50),
celular VARCHAR(50),
profissao VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Erro na criação da tabela: " . $conn->error;
        }
        $conn->close();
        ?>
    </body>
</html>
