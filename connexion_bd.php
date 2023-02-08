<!DOCTYPE html>
<html lang="fr">
  <head>
    <title> Connexion_bd</title>
  </head>
  <body>
    <?php
      define('Servername', 'localhost');
      define('Username' ,'tuto2023');
      define('Password','Info2023secuTutotP1');
      define('DB_name' , 'Db_user');
      $conn = new mysqli(Servername, Username, Password, DB_name);
      if($conn->connect_error){
          die('Erreur : ' .$conn->connect_error); 
      }
    ?>
  </body>
</html>
