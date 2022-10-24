<?php

include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM `immunization-schedule` WHERE id=$id";
    $result=mysqli_query($con, $sql);
    if($result){
        echo "Deleted successfull";
        header('location:immunisationschedule.php');
    }else{
        die(mysqli_error($con));
    }
}

?>