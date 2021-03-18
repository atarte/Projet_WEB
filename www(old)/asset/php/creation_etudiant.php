<?php
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['pilote']) && isset($_POST['promotion']) && isset($_POST['specialite'])) {
    include'./config.php';

    $req = "SELECT Id_Users FROM Users WHERE Email='".$_POST['email']."';";
    $query = $bdd->query($req);

    $count = $query->rowCount();
    

    if ($count == 0 ) {
        $_POST['pilote'] = intval($_POST['pilote']);
        $_POST['promotion'] = intval($_POST['promotion']);
        $_POST['specialite'] = intval($_POST['specialite']);
        
        $insert = "CALL Creation_Etudiant('".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['email']."', '".$_POST['pwd']."', ".$_POST['pilote'].", ".$_POST['promotion'].", ".$_POST['specialite'].");";
        // echo $insert;
        $bdd->exec($insert);
        header("Location: ../../gestion_etudiant.php");
    }
    else {
        header("Location: ../../gestion_etudiant.php?erreur=2");
    }
}
else {
    header("Location: ../../gestion_etudiant.php?erreur=1");
}
?>