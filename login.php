<?php
//$passHash = password_hash("bove123", PASSWORD_DEFAULT);
//echo ($passHash);
//var_dump(password_verify("", $passHash));
require_once('utils/connectdb.php');

$errors = [];

//traitement du formulaire de l'admin 
if ($_SERVER["REQUEST_METHOD"] == "POST"&& isset($_POST['username'],$_POST['password'])) {

$pdo=connectdb();
$reponse = $pdo->prepare("SELECT username, password FROM dauphineexam.utilisateur WHERE username = :username ");
$reponse->execute([
    ':username' => $_POST['username'],
  
]);
$user=$reponse->fetch();
if ($user !== false && password_verify($_POST['password'], $user['password'])) { {
session_start();
    $_SESSION['username'] = $_POST['username'];
    header("location: ../admin/index.php");
}

}else {
   
   
    $errors[] = "invalid username or password";
    

}   
}
?>
<form class="bg-secondary p-5  m-auto " method="POST" action="login.php">
<label for="username">user name</label>
<input type="text" name="username" id="username" required>
<label for="password">password</label>
<input type="password" name="password" id="password" required>
<input type="submit" value="login">
<?php echo("<p style='color:red'>" . implode("<br>", $errors) . "</p>"); ?>
</form>


