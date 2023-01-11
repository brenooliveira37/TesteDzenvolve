<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
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
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dz_dev_test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "<br><h1>Ocorreu um erro grave ao tentar carregar os dados tente novamente mais tarde.</h1><br>";
        }

        $sql = "SELECT * FROM MulheresAdultas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            ?>
            <table class="table thead-light table-hover">
                <tr style="font-size: 20px;" class="bg-light">
                    <td>Código</td>
                    <td>Nome</td>
                    <td>Sexo</td>
                    <td>CPF</td>
                    <td>Data de Nascimento</td>
                    <td>E-mail</td>
                    <td>Celular</td>
                    <td>Profissão</td>
                    <td>Data do registro</td>
                    <td>Ação</td>
                </tr>
                <?php
                while ($dado = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dado['id']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['sexo']; ?></td>
                        <td><?php echo $dado['cpf']; ?></td>
                        <td>
                            <?php
                            $dataNascimento = $dado['dataNascimento'];
                            $dataNascimento = date('d/m/Y', strtotime($dataNascimento));
                            echo $dataNascimento;
                            ?>
                        </td>
                        <td><?php echo $dado['email']; ?></td>
                        <td><?php echo $dado['celular']; ?></td>
                        <td><?php echo $dado['profissao']; ?></td>
                        <td>
                            <?php
                            $reg_date = $dado['reg_date'];
                            $reg_date = date('d/m/Y', strtotime($reg_date));
                            echo $reg_date;
                            ?>
                        </td>
                        <td>
                            <a href="editar.php?codigo=<?php echo $dado['id']; ?>"
                               class="btn btn-warning" role="button">Editar</a>
                            <a href="deletar.php?codigo=<?php echo $dado['id']; ?>"
                               class="btn btn-danger" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php
        } else {
            echo "0 results";
        }
        ?>
    </body>
</html>
