<!DOCTYPE html>
<html lang="fr">
<head>
  <title> Formulaire d'identification sécurisé </title>
<style>
h1.box-signin {
  background-image: url("../image/im.png") ; 
  width: 400px;
  height: 110px;
  line-height: 80px;
  margin: -40px -23px 43px ;
  padding: 50px ;
  background-size: cover;
  background-repeat: no-repeat;
}

.box {
  border: 1px solid black;
  padding: 1px 45px 56px 12px;
  margin: auto;
  width: 430px;
}
.box-button-login {
  border-radius: 25px;
  background: #80e9a3;
  text-align: center;
  cursor: pointer;
  font-size: 20px;
  display: inline-block;
  width: 30%;
  height: 51px;
}
.box-register-adduser
{
  border-radius: 25px;
  background: #80e9a3;
  text-align: center;
  cursor: pointer;
  text-decoration: none;
  font-size: 20px;
  display: inline-block;
  width: 30%;
  height: 51px;
}
.box-reset 
{
  border-radius: 25px;
  background: #80e9a3;
  text-align: center;
  cursor: pointer;
  text-decoration: none;
  font-size: 20px;
  display: inline-block;
  width: 30%;
  height: 51px;
}
.box-register-adduser a {
  text-decoration: none;
  color : black;
}
strong {
  font-size:20px;
  padding: 5px;
  line-height:45px;
  background-color: #80e9a3;
}
.box-input {
  font-size: 18px;
  background: #fff;
  border: 1px solid #5c7186;
  margin-bottom: 25px;
  padding-left:10px;
  width: 349px;
  height: 52px;
}
.box-input:focus {
    outline: none;
    border-color:#5c7186;
}
p.errorMessage {
    background-color: #e66262;
    padding: 5px 10px;
    color: #FFFFFF;
}
</style>
</head>
<body>
  <?php
  require('connexion_bd.php');
  require('header.php');
  session_start();
  if (isset($_POST['username'], $_POST['password'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `Users` WHERE username= '" . $username . "' and password='" . hash('sha256', $password) . "'";
    $result = mysqli_query($conn, $query) or die("mysql_error");
    $rows = mysqli_num_rows($result);
    echo "<script>console.log('Debug Objects: " . $rows . "' );</script>";
    if ($rows == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      header("Location: index.php");
      die();
    } else {
      $message = "Incorrect username or password.";
    }
  }
  ?>
  <form class="box" action="" method="post">
    <h1 class="box-signin"></h1>
    <input type="text" class="box-input" name="username" placeholder="User *">
    <input type="password" class="box-input" name="password" placeholder="PassWord *">
    <input type="submit" value="Connexion " name="submit" class="box-button-login">
    <input type="reset" value="Reset " class="box-reset">
    <p class="box-register-adduser"> <a href="singup.php"><strong>Add user</strong></a></p>
    <?php if (!empty($message)) { ?>
      <p class="errorMessage"><?php echo $message; ?></p>
    <?php } ?>
  </form>
</body>
</html>