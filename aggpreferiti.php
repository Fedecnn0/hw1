<?php
include 'auth.php';
    if (!$username = checkAuth()) {
        header("Location: hw1_home.php");
        exit;
    }

    $id = urlencode($_GET['dati']);
    $carica = ($_GET['foto']);
    $nome = ($_GET['razza']);

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);

    $row = "SELECT username FROM preferiti WHERE username = '".$username."' and razza = '".$id."'";
    $res=mysqli_query($conn, $row);

    if (mysqli_num_rows($res) == 0) {
        $query = "INSERT INTO preferiti (username, razza, carica, name) VALUES('$username', '$id', '$carica', '$nome')";  
        mysqli_query($conn, $query); 
    }

?>