<?php
include 'nav.php';
if (isset($_SESSION["name"]) and isset($_SESSION["type"])) {
  header('Location:index.php');
  die();
}
if(isset($_GET['error']) and $_GET['error']==1){
  ?>
      <script>alert("Username already exists.");</script>
  <?php
}
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST)) {
  $name = test_input($_POST["name"]);
  $pass = test_input($_POST["pass"]);
  $cpass = test_input($_POST["cpass"]);
  $contact = test_input($_POST["number"]);
  $type = test_input($_POST["type"]);
  if ($type == "receiver"){
    $group = test_input($_POST["group"]);
  }
  else{
    $group=NULL;
  }
  if ($pass != $cpass){
    ?>
    <script>alert("Password and Confirm Password donot match");</script>
    <?php
  }
  else{
    $con=mysqli_connect("localhost","id19510424_root","\k<G0~@G&KqPw0eK","id19510424_blood") ;
    $qr="SELECT * FROM `users` WHERE `name`='$name'";
    $res=mysqli_query($con,$qr);
    $dis=mysqli_fetch_assoc($res);
    if ($dis){
      header("Location: registration.php?error=1");
      die();
    }
    $qr="INSERT INTO `users`(`name`, `pass`, `type`, `blood_group`, `contact`) VALUES ('$name','$pass','$type','$group','$contact')";
    $res=mysqli_query($con,$qr);
    $_SESSION['name']=$name;
    $_SESSION['type']=$type;
    header("Location: index.php");
    die();
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="generator" content="Hugo 0.72.0" />
    <title>Sign Up</title>
  </head>
  <body>
    <!-- Form -->
    <div class="container">
      <div class="row">
        <div class="container col-lg-6 justify-content-center">
          <form class="row g-3 align-items-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="col-12">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="Username"
                  required
                />
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <input
                  type="password"
                  class="form-control"
                  id="pass"
                  name="pass"
                  placeholder="Password"
                  required
                />
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <input
                  type="password"
                  class="form-control"
                  id="cpass"
                  name="cpass"
                  placeholder="Confirm Password"
                  required
                />
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <input
                  type="number"
                  min="1000000000"
                  max="9999999999"
                  class="form-control"
                  id="number"
                  name="number"
                  placeholder="Contact No."
                  required
                />
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <select
                  class="form-select"
                  onchange="blocker()"
                  aria-label="Default select example"
                  name="type"
                  id="type"
                  required
                >
                  <option selected value=<?php echo NULL; ?>>User Type</option>
                  <option value="hospital">Hospital</option>
                  <option value="receiver">Receiver</option>
                </select>
              </div>
            </div>

            <div class="col-12">
            <div class="input-group">
              <select class="form-select" aria-label="Default select example" id="group" name="group" required>
                <option selected value=<?php echo NULL; ?>>Blood Type</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
            </div>
          </div>

      

            <div class="col-12">
              <button type="submit" class="btn btn-danger">Sign Up</button>
              <a class="btn btn-outline-danger" href="login.php">Log in</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
  include 'footer.html';
?>
<script>
  function blocker() {
    var a=document.getElementById("type").value;
    if (a=="hospital"){
      document.getElementById("group").disabled=true;
    }
    else{
      document.getElementById("group").disabled=false;
    }
  }
</script>