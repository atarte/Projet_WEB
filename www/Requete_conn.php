<?php
      
      //Variable pour la connexion à la base via PDO
			$servername = 'projetweb.cokj0wfmdhfw.eu-west-3.rds.amazonaws.com';
			$username = 'GroupeCat';
			$password = 'ProjetWeb';
            
            try{
                //On établie la connexion
                $conn = new PDO("mysql:host=$servername;dbname=GroupeCat_Test;port=3315", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                /*Sélectionne les valeurs Users pour chaque entrée de la table*/
                $sth = $conn->prepare("SELECT Id_Users,Email,Passwd FROM Users WHERE Email ='".$_GET["User"]."' AND Passwd ='".$_GET["Pass"]."' ;");
                $sth->execute();
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $resultat = $sth->fetch();

                //Analyse et envoi du résultat
                if (isset($resultat['Id_Users'])) {
                  echo $resultat["Id_Users"];
                }
                else{
                  echo 'Erreur';
                }
            }
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(Exception $e){
              echo "Erreur";
            }

?>