<?php 

include "nav.php";

$msg='';
if (isset($_POST['submit'])){

    open_Con();
       $user=$_POST["email"];
        $psw=$_POST["password"];
        $sql = "SELECT * FROM students where Email='".$user."' and password='".$psw."'" ;
        $result = mysqli_query(  open_Con(), $sql);
        
        if (mysqli_num_rows($result)!=0) {
        if ($row=mysqli_fetch_assoc($result)) {
    
			$_SESSION['user']=$row['Email'];
            header('location: index.php');

        } else {
           $msg= "Incorrect username or password.";
        }}
         close_Con();
    }else{
		unset($_SESSION['user']);
	}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
	<link rel="stylesheet" href="css/style.css">
    <script src="faizan.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/1ca0d34845.js" crossorigin="anonymous"></script>
	<script src="//code.jquery.com/jquery.min.js"></script>
</head>

<body>
<div id="nav-placeholder">

</div>
<script>
    $.get("nav.php", function(data){
        $("#nav-placeholder").replaceWith(data);
    });
    </script>
   <div class="all">
<div class="containerLog">
	<div class="headerLog">
		<h2>Login!</h2>
	</div>
	<form id="form" action="" method="POST" class="formReg">
	<div class="form-control">
			<label for="username">Email</label>
			<input type="email" name="email" placeholder="email" id="email" />
			<small>Error message</small>
		</div>
        <div class="form-control">
			<label for="username">Password </label>
			<input type="password" name="password" placeholder="Password" id="password"/>
			<small>Error message</small>

		</div>
       
        <button name="submit" class="btn">Submit</button>
<br>		 <label style="color:red"><?php  echo $msg; ?></label>	<br>
<a href="register.php" id="signup" class="signup">Dont have an account? Register!</a>

                </form>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<div id="foot-placeholder">

    
</div>
<script>
    $.get("foot.html", function(data){
        $("#foot-placeholder").replaceWith(data);
    });
    </script>
</body>
</html>