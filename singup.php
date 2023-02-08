<!DOCTYPE html>
<html lang="fr">
  <head>
    <title> Sign up </title>
    <style> 
      .box {
        border: 1px solid black ;
        padding: 10px 15px 10px 25px;
        background: linear-gradient(rgba(65, 65, 219, 0.5), rgba(134, 228, 212, 0.5));
        margin: 30px auto;
        width: 363px;
      }
      h1.box-singup {
        border-radius: 25px;
        background-image: url("../image/s.png") ; 
        background-repeat: no-repeat;
        background-size: cover;
        width: 310px;
        height: 110px;
        padding: 50px ;
        line-height: 80px;
        font-size: 35px;
        color: #f2f7f8;
        text-align:center;
        margin: -30px -25px 45px;
      }
      .box-button-Adduser{
        border-radius: 25px;
          background: #80e9a3;
          text-align: center;
          cursor: pointer;
          text-decoration: none;
          font-size: 20px;
          display: inline-block;
          width: 40%;
          height: 51px;
      }
      .box-register
      {
        text-align:center;
        margin-bottom:0px;
      }
      .box-register a
      {
        text-decoration:none;
        font-size:12px;
        color:rgb(229, 245, 242);
      }
      strong {
        font-weight:bold;
        color :black;
        font-size:20px;
        padding: 5px;
        line-height:45px;
        border:3px solid #758f75;
        border-radius:25px;
        background-color: #80e9a3;
      }
      .box-button-reset {
          border-radius: 25px;
          background: #80e9a3;
          text-align: center;
          cursor: pointer;
          text-decoration: none;
          font-size: 20px;
          display: inline-block;
          width: 40%;
          height: 51px;
        }
      .box-input {
        font-size: 14px;
        background: #fff;
        border: 1px solid #ddd;
        margin-bottom: 25px;
        padding-left:10px;
        border-radius: 5px;
        width: 347px;
        height: 50px;
      }
      .box-input:focus {
          outline: none;
          border-color:#5c7186;
      }
      .errorMessage {
          background-color: #b150ac;
          border: #AA4502 1px solid;
          color: #FFFFFF;
          width:330px;
          border-radius: 3px;
      }
    </style>
  </head>
  <body>
    <?php
    require('connexion_bd.php');
    require('header.php');
    /* verfication de la validité des champs
    en supprimant les antislashes pour échapper à des caractères spéciaux dans une entrée utilisateur.  */
    if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])) {
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($conn, $username);
      $email = stripslashes($_REQUEST['email']);
      $email = mysqli_real_escape_string($conn, $email);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn, $password);
      $req_verif = "SELECT * FROM `Users` WHERE username='" . $username . "'";
      $result = mysqli_query($conn, $req_verif) or die("mysql_error");
      $user = mysqli_num_rows($result);
      $req_verifEmail = "SELECT * FROM `Users` WHERE email='" . $email . "'";
      $result2 = mysqli_query($conn, $req_verifEmail) or die("mysql_error");
      $user2 = mysqli_num_rows($result2);
      $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,20}$/';
      // vérification de la validité des données de champs du formulaire 
      if ($user != 0) {
        $message = "Sorry, the username is already in use";
      } elseif ($user2 != 0) {
        $message = "Sorry, the email address is already in use" ;
      } elseif (!preg_match($pattern, $password)) {
        $message = "Oups ! the password must be between 8 and 20 caracteres.
                    <br> - must have at least one Upercase, 
                    Lowercase<br> - 1 digital caractere";
      } else {
        // Hashage de mots de passe
        $query = "INSERT into `Users` (username, email, password)
                VALUES ('" . $username . "', '" . $email . "', '" . hash('sha256', $password) . "')";
        // Exécuter la requête sur la base de données
        $res = mysqli_query($conn, $query);
        if ($res) {
          echo "<div class='sucess'>
                  <h1>You have successfully registered.</h1>
                  <p> Click here to <a href='signin.php'>sign in</a></p>
                </div>";
          exit(0); //exit(0) est pour éviter la soumission redondante de formulaire.
        }
      }
    }
    ?>
    <form class="box" action="" method="post" asp-antiforgery="false">
      <h1 class="box-singup"></h1>
      <input type="text" class="box-input" name="username" placeholder="Username *" minlength="4" maxlength="30" required />
      <input type="email" class="box-input" name="email" placeholder="Email *" pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)" required />
      <input type="password" class="box-input" name="password" placeholder="Password*"  minlength="6" maxlength="30" required/>
      <input type="submit" name ="submit" value="Sign up" class="box-button-Adduser"/>
      <input type="reset"  value="Reset" class="box-button-reset"/>
      <p class="box-register"> Already subsribe ? <a href="signin.php"><strong>Sign in</strong></a></p>
      <?php if (!empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
      <?php } ?>
    </form>
  </body>
</html>