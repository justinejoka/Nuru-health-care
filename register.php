<?php 
session_start();

	include("connect.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		//$user_name = $_POST['user_name'];
		//$password = $_POST['password'];

		$user_name = mysqli_real_escape_string($con, $_POST['user_name']);
		$password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($password) && $password != "" ){

      /*if (strlen($password) <= '8') {
          echo "Your Password Must Contain At Least 8 Digits !"."<br>";
      }*/
      if(!preg_match("#[0-9]+#",$password)) {
          echo "Your Password Must Contain At Least 1 Number !"."<br>";
      }
      elseif(!preg_match("#[A-Z]+#",$password)) {
          echo "Your Password Must Contain At Least 1 Capital Letter !"."<br>";
      }
      elseif(!preg_match("#[a-z]+#",$password)) {
          echo "Your Password Must Contain At Least 1 Lowercase Letter !"."<br>";
      }
      elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
          echo "Your Password Must Contain At Least 1 Special Character !"."<br>";
      }
  }else{
      echo "Please Enter your password"."<br>";
  }

		/*if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into userz (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query) or die (mysqli_error($con));
			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}*/
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://fontawesome.com/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div class="login">

    <div class="login-side">
      <!--<img src="images/sharon-mccutcheon-FEPfs43yiPE-unsplash.jpg" alt="">-->
      <h4>Nuru-Health Care Immunisation Management</h4>
    </div>

    <div class="login-container">

      <div class="logo-image">
        <img src="images/jeremy-bezanger-TiktAywR5n8-unsplash.jpg" alt="">
      </div>
      <form method="post" action="">
        <h3>Register</h3>
        <hr>
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="user_name" value="" id="usrname"><br>
        <hr>

        <label for="psw" ><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="usrname"><br>
        <hr>
       

        <button type="submit" class="submt" name="reg_user">Register</button>
        <br><br><br>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label><br><br><br><br><br>
          
       
        <p>Already have an account? <a href="login.php">Sign in</a></p>
      </form>
    </div>



  </div>

  </div>
</body>

</html>