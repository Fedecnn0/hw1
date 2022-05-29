<?php
include 'auth.php';
    if (!$username = checkAuth()) {
        header("Location: hw1_home.php");
        exit;
    }

    $id = urlencode($_GET['dati']);

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    
    $query = "DELETE  from preferiti where username = '".$username."' and razza = '".$id."'" ; 
    mysqli_query($conn, $query);
    echo $query;
?>