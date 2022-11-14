<?php

include 'connect.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link rel="stylesheet" href="parents.css">

  <link rel="stylesheet" href="https://fontawesome.com/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Client</title>
</head>

<body>
  <div class="container-client">
    
      <div class="side-bar">
        <div class="logo">
          <div class="logo-image">
            <img src="images/jeremy-bezanger-TiktAywR5n8-unsplash.jpg" alt="">
          </div>
          <div class="logo-head">
            <h4>Nuru</h4>
            <div class="h-color">
              <h4>-Health</h34>
            </div>
          </div>


        </div>
        <div class="childs-name">
        <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
          <h4><?php if (isset($_SESSION['user_name'])) echo $_SESSION['user_name']; ?></h4>
        
        </div>
        <div class="main-menu">
          <h4 class="fade">Main Menu</h4>
          <h4><i class="fa fa-list-alt" aria-hidden="true"></i><a href="client.php">Immunisation Schedule</a> </h4>
          <h4><i class="fa fa-list-alt" aria-hidden="true"></i><a href="myschedule.php">My Schedule</a> </h4>
        </div>
      </div>
    
    
      <div class="side2">
      <div class="heading">
            
            <div class="headp">
              <h1>Vaccinations for <br> babies and children</h1>
            </div>
           <!-- <img src="images\julien-flutto-HPha3t0r4MU-unsplash.jpg" alt="" height="100px" width="100px">-->
      </div>

      <div id="myProgress">
        
        <caption><b>MY IMMUNISATION PROGRESS</b></caption>
        <div id="myBar" aria-precentnow="0" aria-precentmin="0" aria-precentmax="100" ></div>
      </div>
      <button onclick="increase()">Click</button>
      <table>
         
          
          <caption><b>my Schedule</b></caption>
            <tr>
              <th>NO</th>
              <th>TITTLE</th>
              <th>DESCRIPTION</th>
              <th>SCHEDULE</th>
              <th>ACTIONS</th>
            </tr>

            <?php

$sql="select *from `immunization-schedule`";
$result=mysqli_query($con,$sql);
if($result){

  while( $row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $tittle=$row['tittle'];
    $description=$row['description'];
    $schedule=$row['schedule'];
    
    echo '
    <tr>
          <td>'.$id.'</td>
          <td>'.$tittle.'</td>
          <td>'.$description.'</td>
          <td>'.$schedule.'</td>
          <td>

<button><a href="confirm.php"> Confirm</a></button> 
<button><a href="cancel.html">Cancel</a></button>  
</td>

        </tr>
    ';

  }

}

?>
          
          </table>
        </div>
      </div>
    
  </div>
<script>
  /*var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}*/

function value() {
  var x = document.getElementById("myBar").getAttribute("aria-precentnow");
  return x;
}

function rvalue(precent) {
  document.getElementById("myBar").setAttribute("aria-precentnow", precent);
  document.getElementById("myBar").setAttribute("style", "width: " + precent + "%;");
  document.getElementById("myBar").innerHTML = (precent + "%");
}


function increase() {
  var i = value();
  if (i <= 100) {
    i++;
    rvalue(i+7.6);
  } else {
    alert("Congrats you hit 100%");
  }
}
</script>
</body>

</html>