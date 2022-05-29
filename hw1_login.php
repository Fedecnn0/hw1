<?php

    include 'auth.php';
    if ($username = checkAuth()) {
        header("Location: hw1_home.php");
        exit;
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die (mysqli_error($conn));
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $query = "SELECT username, password FROM users WHERE  username = '".$username."'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if(mysqli_num_rows($res)>0)
        {  
            $entry = mysqli_fetch_assoc($res);
            if(password_verify($password, $entry['password'])){
                $_SESSION["username"] = $entry['username'];
                header("Location: hw1_home.php");
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>
            LoginYourDog
        </title>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Hurricane&family=Jost:wght@200&family=Roboto:ital,wght@1,900&family=Smokum&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='hw1_login.css'>
        <script src='hw1_login.js' defer="true"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <header>
            <nav>
                <div id="flex-container1"> 

                    <span class="flex-item">
                        <a href="hw1_contatti.php">
                            Contatti
                        </a>
                    </span>
                                                                               
                </div>        
            </nav>

            <h1> Benvenuto da YourDogs</h1>
            
        </header>

        <main class="login">
            <form name='login' method='POST'>

                <p class="login">Accedi:</p>

                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username'></div>
                </div>
                <div id='Errname' class="errore"></div>

                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password'></div>
                </div>
                <div id='Errpassword' class="errore"></div>

                <label>&nbsp;<input type='submit' value='Accedi'></label>
                <div id='Errinserire' class="errore"></div>

                <p id='link'>Non hai un account? <a href="hw1_registrazione.php">Registrati</a></p>
            </form>
        </main> 
        
        <footer>
            <h2>Federica Cannizzaro 1000004449</h2>
        </footer>

    </body>

</html>