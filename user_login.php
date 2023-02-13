<?php

include 'main/connection.php';
include 'main/functions.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   
   $pass = sha1($_POST['pass']);
  
   $function= new functions();
   $select_user = $function->loginCheck($email,$pass);
   //header('location:home.php');
   
   // if($select_user->rowCount() > 0){
   //    $_SESSION['user_id'];
   //    header('location:home.php');
   // }else{
   //    $message[] = 'Incorrect username or password!';
   // }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'main/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Login now</h3>
      <p>Default username = <span>123@gmail.com</span> & Password = <span>900</span></p>
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" class="btn" name="submit">
      <p>don't have an account?</p>
      <a href="user_register.php" class="option-btn">Register now</a>
   </form>

</section>













<?php include 'main/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>