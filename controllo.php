<?php
include 'auth.php';
    if (!$username = checkAuth()) {
        header("Location: hw1_home.php");
        exit;
    }

    $id = urlencode($_GET['breed']);

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);

    $row = "SELECT username FROM preferiti WHERE username = '".$username."' and razza = '".$id."'";
    $res=mysqli_query($conn, $row);

    if (mysqli_num_rows($res) > 0) {
        $ris = true;
    }else {
        $ris = false;
    }
    echo json_encode($ris);
    mysqli_close($conn);

?>