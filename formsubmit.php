<?php
include 'nav.php'; // TO ACCESS SESSION VARIABLES
$name=$_SESSION['name'];
// FOR ADDING SAMPLES
if (isset($_POST['units']) and isset($_POST['group'])){
          $units = test_input($_POST["units"]);
          $group = test_input($_POST["group"]);
          $con=mysqli_connect("localhost","id19510424_root","\k<G0~@G&KqPw0eK","id19510424_blood") ;
          $qr="INSERT INTO `available`(`hospital`, `type`, `units`) VALUES ('$name','$group','$units')";
          $res=mysqli_query($con,$qr);
          header("Location: addbloodinfo.php?sample=1");
          die();
}
// FOR REQUESTING SAMPLES
elseif (isset($_POST['request'])) {
          $id=$_POST['request'];
          $con=mysqli_connect("localhost","id19510424_root","\k<G0~@G&KqPw0eK","id19510424_blood") ;
          $qr="INSERT INTO `requests`(`sample`, `user`) VALUES ('$id','$name')";
          $res=mysqli_query($con,$qr);
          header("Location: index.php?request=1");
          die();
}
// DEFAULT
else{
          header("Location: index.php");
}
?>