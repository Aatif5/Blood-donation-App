<?php
// REQUEST BUTTON ONLY FOR RECEVIERS
$btn=FALSE;
if (isset($_SESSION['type'])){
  if ($_SESSION['type']=='receiver'){
    $btn=TRUE;
    $name=$_SESSION["name"];
    // FOR RECEVIER BLOOD GROUP
    $con=mysqli_connect("localhost","id19510424_root","\k<G0~@G&KqPw0eK","id19510424_blood") ;
    $qr="SELECT `blood_group` FROM `users` where `name`='$name'";
    $res=mysqli_query($con,$qr);
    $temp=mysqli_fetch_assoc($res);
    $grp=$temp['blood_group'];
  }
}
$con=mysqli_connect("localhost","id19510424_root","\k<G0~@G&KqPw0eK","id19510424_blood") ;
// FETCH SAMPLES
$qr="SELECT * FROM `available` order by `time`";
$res=mysqli_query($con,$qr);
?>
<div class="container">
  <div class="row row-cols-1 row-cols-md-2 g-4">
<?php
// DISPLAY SAMPLES
while($item=mysqli_fetch_assoc($res)){
?>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            Blood Group: <?php echo $item['type']; ?>
          </h5>
          <p class="card-text">
            Available: <?php echo $item['units'],' Units'; ?>
          </p>
          <p class="card-text">
            Hospital: <?php echo $item['hospital']; ?>
          </p>
          <?php
          if($btn and $grp==$item['type']){
            ?>
            <form method="post" action="formsubmit.php">
              <input type="hidden" name="request" value="<?php echo $item['sample_id']; ?>"/>
              <button type="submit" class="btn btn-danger">Request Sample</button>
            </form>
            <?php
          }
          ?>
        </div>
      </div>
    </div>

<?php
}
?>
    
  </div>
</div>
