<?php
    require_once 'auth.php';
    if (!$username = checkAuth()) {
        header("Location: hw1_login.php");
        exit;
    }

    $apikey = 'f0dcbb06-486a-4e43-aa2f-0b3a8bec24b8';

    $cerca = urlencode($_GET["trova"]);
    $url = "https://api.thedogapi.com/v1/breeds?api_key='.$apikey.'&limit=30'";
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);
    $json = json_decode($data, true);
    curl_close($curl);
    echo $data;

?>