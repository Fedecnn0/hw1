<?php
include 'auth.php';
    if (!$username = checkAuth()) {
        header("Location: hw1_login.php");
        exit;
    }

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);

    $row = "SELECT * FROM preferiti WHERE username = '".$username."'";
    $res=mysqli_query($conn, $row);

    if (mysqli_num_rows($res) > 0) {  
        while($row= mysqli_fetch_assoc($res)) {
            $ris[]=$row;
        }
    }
    mysqli_close($conn);
    echo json_encode($ris);

?>