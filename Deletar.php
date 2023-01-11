<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $id = isset($_GET["codigo"]) ? $_GET["codigo"] : " ";

        $servername = "107.180.57.185";
        $username = "dz_dev";
        $password = "p?%3DY?#*LBW";
        $dbname = "dz_dev_test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM MulheresAdultas WHERE id=" . $id;

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
        header("Location: listar.php");
        ?>

    </body>
</html>
