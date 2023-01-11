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
        <div>
            <h1>
                Mulheres acima de 20 anos, façam o seu cadastro!
            </h1>
        </div>
        <form action="atualizar.php" method="get" autocomplete="on">
            <?php
            $id = isset($_GET["codigo"]) ? $_GET["codigo"] : " ";

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dz_dev_test";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM MulheresAdultas WHERE id=" . $id;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($dado = $result->fetch_assoc()) {
                    ?>
                    <div class="input-group mb-3" style="display:none">
                        <input type="text" class="form-control"  maxlength="100" 
                               value="<?php echo $dado['id']; ?>" name="codigo" >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome</span>
                        </div>
                        <input type="text" class="form-control"  maxlength="100"
                               required autofocus name="nome" value="<?php echo $dado['nome']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sexo</span>
                        </div>
                        <input type="text" class="form-control" maxlength="100"
                               required autofocus name="sexo" value="<?php echo $dado['sexo']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CPF</span>
                        </div>
                        <input type="text" class="form-control"  maxlength="100"
                               required autofocus name="cpf" value="<?php echo $dado['cpf']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Data de Nascimento</span>
                        </div>
                        <input type="date" class="form-control" maxlength="100"
                               required autofocus name="dataNascimento" value="<?php
                               $dataNascimento = $dado['dataNascimento'];
                               $dataNascimento = date('Y-m-d', strtotime($dataNascimento));
                               echo $dataNascimento;
                               ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">E-mail</span>
                        </div>
                        <input type="email" class="form-control" maxlength="100"
                               required autocomplete="off" name="email" value="<?php echo $dado['email']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Celular</span>
                        </div>
                        <input type="tel" class="form-control" 
                               required pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" name="celular" value="<?php echo $dado['celular']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Profissão</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Professora" maxlength="100"
                               required autofocus name="profissao" value="<?php echo $dado['profissao']; ?>">
                    </div>
                    <?php
                }
            }

            $conn->close();
            ?>

            <div align="center">
                <input type="submit" class="btn btn-success col-sm-3" value="Salvar">
            </div>
        </form>
    </body>
</html>
