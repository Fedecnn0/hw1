<?php
    require_once 'auth.php';

    if (checkAuth()) {
        header("Location: hw1_home.php");
        exit;
    }   

    if (!empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["email"]) && 
        !empty($_POST["username"]) && !empty($_POST["indirizzo"]) && !empty($_POST["password"]) && !empty($_POST["verifica"]))
    {
        $errori = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $errori[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $errori[] = "Username già utilizzato";
            }
        }
    
        if (strlen($_POST["password"]) < 8) {
            $errori[] = "Caratteri password insufficienti";
        } 
       
        if (strcmp($_POST["password"], $_POST["verifica"]) != 0) {
            $errori[] = "Le password non coincidono";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errori[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $errori[] = "Email già utilizzata";
            }
        }

        if (count($errori) == 0) {
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $indirizzo = mysqli_real_escape_string($conn, $_POST['indirizzo']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(nome, cognome,  email, username, indirizzo, password) VALUES('$nome', '$cognome',  '$email', '$username', '$indirizzo', '$password')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                mysqli_close($conn);
                header("Location: hw1_home.php");
                exit;
            } else {
                $errori[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $errori = array("Riempi tutti i campi");
    }

?>


<html>
    <head>
        <meta charset="utf-8">
        <title>
            RegisterYourDog
        </title>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Hurricane&family=Jost:wght@200&family=Roboto:ital,wght@1,900&family=Smokum&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='hw1_login.css'>
        <script src='hw1_registrazione.js' defer></script>
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

            <h1> Benvenuto da YourDogs </h1>
        </header>

        <main>
            <form name ='registrazione' method='post'>

                <p class="registrazione">Registrati:</p>
                
                <div class="nome">
                    <label>Nome: <input type='text' name='nome'></label>    
                    <span> Formato non valido </span>
                </div> 

                <div class="cognome">
                    <label>Cognome: <input type='text' name='cognome'></label>      
                    <span> Formato non valido </span>
                </div>  
                
                <div class="email">    
                    <label>E-mail: <input type='text' name='email'></label>     
                    <span>Indirizzo email non valido</span>
                </div>

                <div class="username">
                    <label>UserName: <input type='text' name='username'></label> 
                    <span>Nome utente non disponibile</span>   
                </div>

                <div class="indirizzo">
                    <label>Indirizzo: <input type='text' name='indirizzo'></label>
                    <span>Indirizzo non valido</span>
                </div>

                <div class="password">
                    <label>Password: <input type='password' name='password'></label>
                    <span>Inserisci almeno 8 caratteri</span>  
                </div>

                <div class="verifica">
                    <label>Verifica Password: <input type='password' name='verifica'></label>  
                    <span>Le password non coincidono</span>
                </div>

                <label>&nbsp;<input type='submit' value='Registrati'></label>

                <?php
                
                    if(isset($errori)){
                        foreach($errori as $al){
                            echo "<div class ='errore'>";
                            echo $al  . "\n";
                            echo "</div>";
                        }
                    }
                ?>

                <p id="link">Hai un account? <a href="hw1_login.php">Accedi</a></p>
            </form>
            
        </main> 
        
        <footer>
            <h2>Federica Cannizzaro 1000004449</h2>
        </footer>
  
    </body>

</html>