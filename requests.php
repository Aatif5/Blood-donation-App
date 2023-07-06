<?php
include 'nav.php';
if (isset($_SESSION['type']) and $_SESSION['type']=='hospital'){

}
else{
  header("Location: index.php");
  die();
}
$name=$_SESSION["name"];
$con=mysqli_connect("localhost","id19510424_root","\k<G0~@G&KqPw0eK","id19510424_blood") ;
$qr="SELECT * FROM `available` JOIN `requests` ON (`available`.`sample_id`=`requests`.`sample` AND `available`.`hospital`='$name')";
$res=mysqli_query($con,$qr);
?>
<html lang="en">
  <body>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php
        while($item=mysqli_fetch_array($res)){
      ?>
        <div class="col">
          <div class="card">
            <div class="card-header">
              From <b><?php echo $item['user']; ?></b>
            </div>
            <div class="card-body">
              <h5 class="card-title">Blood Group: <?php echo $item['type']; ?></h5>
              <p class="card-text">Required: <?php echo $item['units']; ?> Units</p>
            </div>
          </div>
        </div>
      <?php
        }
      ?>
      </div>
    </div>
  </body>
</html>
<?php
  include 'footer.html';
?>