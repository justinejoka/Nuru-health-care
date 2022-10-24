<?php 

session_start();

	include("connect.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from userz where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
            if(!empty($_POST["password"]) && isset( $_POST['password'] )) {
              $password = $_POST["password"];
              $cpassword = $_POST["cpassword"];
              if (mb_strlen($_POST["password"]) <= 8) {
                  $passwordErr = "Your Password Must Contain At Least 8 Characters!";
              }
              elseif(!preg_match("#[0-9]+#",$password)) {
                  $passwordErr = "Your Password Must Contain At Least 1 Number!";
              }
              elseif(!preg_match("#[A-Z]+#",$password)) {
                  $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
              }
              elseif(!preg_match("#[a-z]+#",$password)) {
                  $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
              }
              elseif(!preg_match("#[\W]+#",$password)) {
                  $passwordErr = "Your Password Must Contain At Least 1 Special Character!";
              } 
              elseif (strcmp($password, $cpassword) !== 0) {
                  $passwordErr = "Passwords must match!";
              }
          } else {
              $passwordErr = "Please enter password   ";
          }

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: parents.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
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
        <h3>Welcome</h3>
        <hr>
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="user_name" id="usrname" required><br>
        <hr>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="usrname" required><br>
        <hr>

        <button type="submit" class="submt" name="login_user">Login</button>
        <br>
        <label><br><br>
          <input type="checkbox" checked="checked" name="remember"> Remember me 
         
          
        </label><br><br><br><br><br>
       
        
        <p>Dont have an account? <a href="register.php">Sign up</a></p>
        
      </form>
    </div>



  </div>

  </div>
</body>

</html>