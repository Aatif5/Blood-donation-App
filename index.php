<?php
include 'nav.php';
//REQUEST MESSAGE
if (isset($_GET['request']) and $_GET['request']=='1'){
  ?>
  <script>
    alert("Requested!");
  </script>
  <?php
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
  </head>
  <body>
    <div class="container">
      <?php
      //FOR GUEST VISITORS
        if (!isset($_SESSION["name"]) and !isset($_SESSION["type"])) {
      ?>
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Welcome to DropBlood.com</h5>
              <p class="card-text">DropBlood is a blood center to support and assist the blood donation and supply between Blood banks and needies.</p>
              <p class="card-text"><i>"The gift of blood is a gift to someone's life."</i></p>
              <a href="registration.php" class="btn btn-danger">Get Started</a>
            </div>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
      <br>
      <h3 id="availablebloodsamples"><center>Available Blood Samples</center></h3>
      <br>
      <?php
        include 'availbsamples.php';
        include 'footer.html';
      ?>
    </div>
  </body>
</html>
