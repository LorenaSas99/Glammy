<?php
    include "db_connection.php";
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!isset($_SESSION['tw_id'])) {
            // nu sunt logat si fac redirect la login
            echo "login";
            header("location: http://localhost/TW_Project/cont.php");
        } else {
            $content = file_get_contents("php://input");
            $data = json_decode($content, true);
            $titlu = $data['titlu'];
            $pret = floatval($data['pret']);
            $descriere = $data['descriere'];
            $user_id = $_SESSION['tw_id'];
            $sql = "INSERT INTO Glammy.Cos (user_id, name, pret, descriere) VALUES($user_id,'$titlu',$pret,'$descriere')";
            $connection = mysqli_connect($db_hostname, $db_username, $db_password);
            if(!$connection) {
                echo"Database Connection Error...".mysqli_connect_error();
            } else {
                $retval = mysqli_query($connection, $sql);
                if(!$retval) {
                    echo "Err".mysqli_error($connection);
                } else {
                    echo "Produs adaugat cu succes $pret";
                }
            }
            mysqli_close($connection);
        }
        exit;
    }
?>