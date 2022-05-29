<?php 

    require_once 'auth.php';
    if (!$username = checkAuth()) {
        header("Location: hw1_login.php");
        exit;
    }
    
?>


<html>
    <head>
        <meta charset="utf-8">
        <title>
            Homework1
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Hurricane&family=Jost:wght@200&family=Roboto:ital,wght@1,900&family=Smokum&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='hw1_login.css'>
        <link rel="stylesheet" href='hw1_acquista.css'>
        <script src='hw1_acquista.js' defer="true"></script>

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

            <div id="menu">
                <div id="line"></div>
                <div id="line"></div>
                <div id="line"></div>
            </div>

            <h1> Benvenuto da <?php echo$_SESSION["username"] ?> YourDogs</h1>
        </header>

        <div id="banner-message">
            <p>Cerca la tua razza </p>

            <select class="breed_select" id="selector">
                <option>seleziona razza</option>
            </select>

        </div>
        <div id="breed_data" class="razz invisibile">
            <img id="breed_image" src="" />
            <p id="info"> 
                Dati sulla razza:
            </p>
            <div id="table">
                <table id="breed_data_table">
                    <tr>
                        <td>Nome: </td>
                        <td id="name"></td>
                    </tr>
                    <tr>
                        <td>Peso: </td>
                        <td id="weight"></td>
                    </tr>
                    <tr>
                        <td>Altezza: </td>
                        <td id="height"></td>
                    </tr>
                    
                    <tr>
                        <td>Allevato per: </td>
                        <td id="bred_for"></td>
                    </tr>
                    <tr>
                        <td>Gruppo di razza: </td>
                        <td id="breed_group"></td>
                    </tr>
                    <tr>
                        <td>Tempo di vita: </td>
                        <td id="life_span"></td>
                    </tr>
                    <tr>
                        <td>Temperamento: </td>
                        <td id="temperament"></td>
                    </tr>
                    <tr>
                        <td>Origine: </td>
                        <td id="origin"></td>
                    </tr>

                </table>
            </div>
            <div id="preferiti">
                <div id="bordo">
                    <img class="cuore" src="like.svg"/>
                    <p>Preferiti</p>
                </div>
            </div>
        </div>

        <footer>
            <h2>Federica Cannizzaro 1000004449</h2>
        </footer>
    </body>
</html>
