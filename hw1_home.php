<?php 

    require_once 'auth.php';
    if (!$username = checkAuth()) {
        header("Location: hw1_login.php");
        exit;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            HomeYourDog
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Hurricane&family=Jost:wght@200&family=Roboto:ital,wght@1,900&family=Smokum&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='hw1_home.css'>
        <script src='hw1_home.js' defer="true"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
  
    <body>
        
        <header>
            <nav>
                <div id="flex-container1"> 
                                                    
                    <span class="flex-item">
                        <a href="hw1_home.php">
                            Home 
                        </a>
                    </span>
                    
                    <span class="flex-item">
                        <a href="hw1_profile.php">
                            Profilo
                        </a>
                    </span>

                    <span class="flex-item">
                        <a href="hw1_contatti.php">
                            Contatti
                        </a>
                    </span>
                                 
                    <span class="flex-item">
                        <a href="hw1_logout.php">
                            Logout
                        </a>
                    </span>
                                                    
                </div>        
            </nav>

            <h1> Benvenuto <?php echo$_SESSION["username"] ?> da YourDogs</h1>
        </header>

        <main>
            
            <a href="hw1_acquista.php" class="block" id="acquista">
                <div class="scelta">
                    <span class="testo">Scopri di più sulla razza che ti piace</span>
                </div>
            </a>
        
        </main>

        <footer>
            <h2>Federica Cannizzaro 1000004449</h2>
        </footer>
        
    </body>
</html>
