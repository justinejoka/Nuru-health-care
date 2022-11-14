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
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: client.php");
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
        <input type="text" placeholder="Enter Username" name="user_name" id="usrnam"  required><br>
        <hr>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" id="usrname" onkeyup="return validate()" required><br>
        <hr>
        <div class="error">
        <ul>
          <li id='upper'>Atleast one uppercase</li>
          <li id='lower'>Atleast one lowercase</li>
          <li id='special_char'>Atleast one special character</li>
          <li id='number'>Atleast one number</li>
          <li id='length'>Atleast 6 characters</li>
        </ul>
      </div>
      <hr>

        <button type="submit" class="submt" name="login_user" >Login</button>
        <br>
        <label><br>
          
         
          
        </label><br>
       
        
        <p>Dont have an account? <a href="register.php">Sign up</a></p>
        
      </form>
      
    </div>



  </div>

  </div>
  <script src="validation.js"></script>
</body>

</html>