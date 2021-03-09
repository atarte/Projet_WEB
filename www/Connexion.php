<?php 
    session_start();
    include("./asset/php/config.php");
?>
<?php
    $err = "";

    if(isset($_POST['but_submit'])) {

        $login = $_POST['login'];
        $pwd = $_POST['pwd'];

        if($login != "" && $pwd != "") {
    
            $query = "SELECT Id_Users, Nom, Prenom FROM Users WHERE Email = '". $login ."' AND Passwd = '". $pwd ."';";
    
            $res = $bdd->query($query);
            $count = $res->rowCount();
            $row = $res->fetch(PDO::FETCH_ASSOC);
            
            if($count == 1 && !empty($row)) { 
                $_SESSION['user_id'] = $row['Id_Users'];
                $_SESSION['user_nom'] = $row['Id_Nom'];
                $_SESSION['user_prenom'] = $row['Id_Prenom'];
            }
            else {
                $err = "mauvaise email ou password";
            }
        }
    }
    else {
        $err = "deux champs requie";
    }
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>


    <form id="form" action="Acceuil.php" method="post">
        <input id="login" type="text" name="login" require>

        <input id="pwd" type="password" name="pwd" require>

        <input id="id_user" type="text" name="id_user" readonly>

        <input type="submit" name="but_submit">

        <!-- <input id="but" type="button" value="pouf"> -->
    </form>

    <div>
        <?php echo @$err; ?>
    </div>
    
    

    <script src="./asset/js/connexion.js"></script>

</body>
</html>