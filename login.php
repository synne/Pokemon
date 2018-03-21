<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="pokemon.css">
        <meta charset="UTF-8">
        <title>Administrator</title>
        <style>
        </style>
        <script type="text/javascript">
            function valider_brukernavn()
            {
                regEx = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
                OK=regEx.test(document.admin_logginn.brukernavn.value);
                if(!OK)
                {
                  document.getElementById("feilBrukernavn").innerHTML="Vennligst skriv inn e-postadressen din.";
                  return false;                    
                }
                document.getElementById("feilBrukernavn").innerHTML="";
                return true;
            }
            
            function valider_passord()
            {
                regEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
                OK=regEx.test(document.admin_logginn.passord.value);
                if(!OK)
                {
                  document.getElementById("feilPassord").innerHTML="Passord er feil.";
                  return false;                    
                }
                document.getElementById("feilPassord").innerHTML="";
                return true;
            }
            
            function valider_alle()
            {
                brukernavnOK = valider_brukernavn();
                passordOK = valider_passord();
                if(brukernavnOK && passordOK)
                {
                    return true;
                }
                return false;
            }
        </script>
    </head>
    <body background="bakgrunn.png">
        <!--<a href="index.php">-->
        <!--</a>-->
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
        
        
        <div id="login">
            <form action="" method="post">
                <tr>
                    <td>Brukernavn:</td>
                    <td>
                        <input type="text" name="Brukernavn" onchange="valider_brukernavn()"/><div id="feilBrukernavn"></div>
                    </td>
                </tr>
                <tr>
                    <td>Passord:</td>
                    <td>
                        <input type="password" name="Passord" onchange="valider_passord()"/><div id="feilPassord"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="logg_inn" value="LOGG INN">
                    </td>
                </tr>
            </form>
        </div>
        <!--
        Brukernavn: tournament@pokemon.com
        Passord: Pokemon1234
        Salt: 45gyut
        -->
        
        
        <?php
        //brukernavn, passord og salt
        //adminside skal ikke funke for de som ikke er logget inn
        //hvis man ikke er logget inn, men prøver og feiler -> tilbake til innlogging
        //skal valideres med javascript på klient og php på server
        
        $db = mysqli_connect("localhost", "root", "", "pokemon_tournament","3306");
        if(!$db){
            die(mysqli_connect_error());
        }
        
        if(isset($_POST["logg_inn"])){ 
            
            $sql = "select * from Admin;";
            $resultat = mysqli_query($db, $sql);
            $rad = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
        
        
            $brukernavn=($_POST["Brukernavn"]);
            $salt=$rad["Salt"];
            $input_passord=$_POST["Passord"];
            $passord=hash("sha256", $input_passord.$salt);

            $sql="Select Brukernavn, Passord from Admin where Brukernavn='$brukernavn' AND Passord='$passord';";
            $resultat = mysqli_query($db, $sql);

            if(mysqli_affected_rows($db)==1){
                $brukernavn=$_POST["Brukernavn"];
                $input_passord=$_POST["Passord"];
                $OK = true;

                if(!preg_match("/^[a-zØÆÅA-ZØÆÅ.@]{6,50}$/", $brukernavn)){
                    echo "Feil! Brukernavnet må være en e-postadresse. <br/>";
                    $OK = false;
                }
                elseif(!preg_match("/^[a-zøæåA-ZØÆÅ0-9]{6,50}$/", $input_passord)){
                    echo "Feil passord.<br/>";
                    $OK=false;
                }
                if(!$OK){
                    die();
                }
                $_SESSION["logget_inn"]=true;
                echo "<center><h2>Du er nå logget inn som admin!<h2></center>";
        ?>
        <div id="adminmenu">
            <li>
                <a href='arena.php'>REGISTRER ARENA</a>
            </li>
            <li>
                <a href='kamp.php'>REGISTRER KAMP</a> 
            </li>
            <li>
                <a href='vinner.php'>REGISTRER VINNER</a>
            </li>
        </ul>  
        <?php
            }           
        }
        ?>
    </body>
</html>