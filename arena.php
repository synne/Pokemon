<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="pokemon.css">
        <meta charset="UTF-8">
        <title>Arena - bildeopplastning</title>
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
            
    <section class="left">

    <?php
    //last opp fil
    if(isset($_POST["lastOpp"])){
        $db = mysqli_connect("localhost", "root", "", "pokemon_tournament","3306");

        if(!$db){
            die("Feil i databasetilkobling");
        }

        $valid_file = true;
        $uploaded_file = "";

        //last opp fil
        if($_FILES["image"]["name"]){
            if(!$_FILES["image"]["error"]){
                $new_file_name = strtolower($_FILES["image"]["name"]);

                if($_FILES["image"]["size"] > (1024000)){
                    echo "Filen er for stor!";  //Kan ikke være større enn 1MB
                    $valid_file = false;
                }

                if($valid_file){

                    if( move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$new_file_name) ){
                        $uploaded_file = "uploads/".$new_file_name;
                        echo "Filen er vellykket lastet opp!";
                        $valid_file = true;
                    }
                    else{
                        echo "Filen er ikke lastet opp.";
                        print_r($_FILES["image"]);
                        $valid_file = false;
                    }
                }
            }
            else{
                echo "Feil i filopplasting: ".$_FILES["image"]["error"];
                $valid_file = false;
            }
        }

        $query = "insert into Arena (";

        if($valid_file){
            $query.= ", picture";
        }
        $query.= ") values('";                                    
        if($valid_file){
            $query.= ",'$uploaded_file'";
        }
        $query.=");";

        //$result = mysqli_query($db, $query);
        $result = $db->query($query);

        if(!$result){
            echo "Feil i databasespørring";
        }
        //elseif(mysqli_affected_rows($db) == 0){
        elseif($db->affected_rows == 0){
            echo "Spørring ble kjørt, men ingen bilder ble lastet opp";
        }
        else{
            echo "Bildet ble lastet opp!";
        }
        //mysqli_close($db);
        $db->close();
    }
    ?>
        <div id="lastopp">    
        <h2>Last opp bilde av arena:</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="picture">Bilde:</label>
                <input id="picture" name="image" type="file" value=""/>
                <input type="submit" name="lastOpp" value="Last opp fil" />
            </form>
        </div>
        </section>
    </body>
</html>