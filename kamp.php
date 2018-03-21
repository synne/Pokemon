<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="pokemon.css">
        <meta charset="UTF-8">
        <title>Kampregistrering</title>
        <style>
        </style>
    </head>
    <body background="bakgrunn.png">
        <?php
        ?>
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

        <!--Skjema for å registrere kamp-->
        <div id = "regkamp">
            <h2>REGISTRER KAMP</h2><br/>
            <h3>Velg trener 1:</h3>
            <?php
            //admin velger rundenummer fra en dropdownliste
            //Etter den er valgt, oppdateres to andre dropdownlister som lister kun navn på deltagere som 
            //har kommet seg videre til denne runden (pass på at de ikke er de samme)
            //to deltager, tid og arena velges, og en knapp trykkes.
            //trener1, trener2, dato, arena, vinner, kampID = nøkkel

            $db = mysqli_connect("localhost", "root", "", "pokemon_tournament", "3306");
            if (!$db) {
                die(mysqli_connect_error());
            }
            $sql = "select trener_id from Trener;";
            $resultat = mysqli_query($db, $sql);
            $arr = array();
            while ($skriv = mysqli_fetch_array($resultat, $arraytype = MYSQLI_NUM)) {
                $arr[] = $skriv;
            }
            ?>
            <form action="" method="post">
                <select name="trener1">
                    <?php
                    for ($i = 0; $i < count($arr); $i++) {
                        echo"<option value='" . $arr[$i][0] . "'>" . $arr[$i][0] . "</option>";
                    }
                    ?>
                </select>


                <?php
                $sql = "select trener_id from Trener;";
                $resultat = mysqli_query($db, $sql);
                ?>
                <h3>Velg trener 2:</h3>
                <select name = "trener2">
                    <?php
                    for ($i = 0; $i < count($arr); $i++) {
                        echo"<option value='" . $arr[$i][0] . "'>" . $arr[$i][0] . "</option>";
                    }
                    ?>
                </select>
            <!--<input type="submit" name="trener2" value="Velg trener 2">-->

                <h3>Velg arena:</h3>
                <select name="Adresse">
                    <?php
                    $sql = "select Adresse from Stage;";
                    $resultat = mysqli_query($db, $sql);
                    $adr = array();
                    while ($skriv = mysqli_fetch_array($resultat, $arraytype = MYSQLI_NUM)) {
                        $adr[] = $skriv;
                    }
                    for ($i = 0; $i < count($adr); $i++) {
                        echo"<option value='" . $adr[$i][0] . "'>" . $adr[$i][0] . "</option>";
                    }
                    
                    ?>

                </select>
                <br/>
                <input type="submit" name="registrer" value="Registrer kamp">
            </form>
            
        </div>
        <?php
        if (isset($_POST["registrer"])) {

            $_SESSION["trener1"] = $_POST["trener1"];
            $_SESSION["trener2"] = $_POST["trener2"];
            $_SESSION["Adresse"] = $_POST["Adresse"];

            $trener1 = $_SESSION["trener1"];
            $trener2 = $_SESSION["trener2"];
            $adresse = $_SESSION["Adresse"];

            if (!$db) {
                die("Feil i databasetilkobling");
            }

            $sql = "Insert INTO Kamp(trener1, trener2, dato, Adresse)";
            $sql.= "Values('$trener1','$trener2','22.07.2016','$adresse')";
            $resultat = mysqli_query($db, $sql);

            if (!$resultat) {
                echo "Klarte ikke sette inn data" . mysqli_error($db);
            } elseif (mysqli_affected_rows($db) == 0) {
                echo "Ingen rader satt inn";
            }
            else{
                echo "Kamp ble registrert!";
            }
        }
        ?>
        <!--hvis den er trykket, gjør trener 1 post til session, insert into kamp, stagename dato-->
    </body>
</html>