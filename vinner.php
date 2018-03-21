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
        
        <h2>Registrer hvem som har vunnet de ulike kampene:</h2>
        <?php
        $db = mysqli_connect("localhost", "root", "", "pokemon_tournament", "3306");
        if (!$db) {
            die(mysqli_connect_error());
        }
        $sql = "Select kampID, trener1, trener2, dato, Adresse from Kamp;";
        $resultat = mysqli_query($db, $sql);
         /*while ($skriv = mysqli_fetch_array($resultat, $arraytype = MYSQLI_NUM)) {
                $arr[] = $skriv;  
         }*/
        while($rad=mysqli_fetch_array($resultat, MYSQLI_ASSOC)){
            echo $rad["kampID"]."<br/>";
            //." ".$rad["trener1"]."<br/>"."".$rad["trener2"]."<br/>";
        }
        ?>
    </body>
</html>