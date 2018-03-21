<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="pokemon.css">
        <meta charset="UTF-8">
        <title>Pokémonturnering - Vinner</title>
        <style>
        </style>
    </head>
    <body background="bakgrunn.png">
        
        <ul class="menu">
            <li class="menu">
                <a href="index.php">HJEM</a>
            </li>
            <li class="menu">
                <a href="login.php">ADMINISTRATOR</a> 
            </li>
            <li class="menu">
                <a href="kampoversikt.php">KAMPOVERSIKT</a>
            </li>
        </ul>  
        <div id="oversikt">
        Kampoversikt
        </div>
        <?php
        $db = mysqli_connect("localhost", "root", "", "pokemon_tournament", "3306");
        if (!$db) {
            die(mysqli_connect_error());
        }
        $sql = "select * from Kamp";    
        $resultat = mysqli_query($db, $sql);
        ?>
    </body>
</html>