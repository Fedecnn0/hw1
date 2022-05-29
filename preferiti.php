<?php
include 'auth.php';
    if ($username = checkAuth()) {
        header("Location: hw1_home.php");
        exit;
    }

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $query = "SELECT * from preferiti where username ='.$usename.'";
    
      
    $query = "INSERT INTO users(nome, cognome,  email, username, indirizzo, password) VALUES('$nome', '$cognome',  '$email', '$username', '$indirizzo', '$password')";
        
    if (mysqli_query($conn, $query)) {
        $_SESSION["username"] = $_POST["username"];
        mysqli_close($conn);
        header("Location: hw1_login.php");
        exit;
    } 
    else {
        $errori[] = "Errore di connessione al Database";
    }
    mysqli_close($conn);
    

?>