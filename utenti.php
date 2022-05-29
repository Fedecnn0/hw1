<?php
    include 'auth.php';

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $row = "SELECT * FROM users";
    $res=mysqli_query($conn, $row);

    if (mysqli_num_rows($res) > 0) {  
        while($row= mysqli_fetch_assoc($res)) {
            $ris[]=$row;
        }
    }
    mysqli_close($conn);
    echo json_encode($ris);
?>