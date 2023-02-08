
************************************************************ReadME**************************************************************** 

Tp 1: ce tp a pour but de créer un formulaire d'identification sécurisé pour les utilisateurs, il comprend les fichiers suivants :
* 'Requete_sql.sql' => il contient les différentes requettes sql nécessaires à la création de la base de données et les tables associées ( il peut nécessiter une adaptation en fonction des spécifications) 
* 'connexion_bd.php'=> établir une connexion avec la base de données.  
* 'signup.php' => pour la gestion de l'inscription de l'utilisateur.
* 'signin.php' => pour la gestion de la connexion utilisateur.
* 'logout.php' => pour la déconnexion de l'utilisateur.
* 'header.php' => importer les headers de sécurité 

Technologies utilisées :
* PHP
* HTML/CSS 
* MySQL

Comment utiliser :

1/ Importer les requêtes SQL contenues dans le fichier 'Requete_sql.sql' pour créer la base de données et les tables associées.
2/ Configurer les informations de connexion à la base de données dans le fichier 'connexion_bd.php'.
3/ Exécuter les fichiers 'signup.php' et 'signin.php' pour tester l'inscription et la connexion de l'utilisateur. (exp : php -S localhost:8000 -t /path/signup.php).

Note : 

* Assurez-vous que le serveur PHP et le serveur MySQL sont en cours d'exécution avant de tester les scripts php.

* identifiant : Example
* mot de passe : Example@23
