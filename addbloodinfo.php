<?php
  include 'nav.php';
  if (!isset($_SESSION['type']) and !($_SESSION['type']=='hospital')){
    header("Location: index.php");
    die();
    }
  // SHOWING SUCCESS MESSAGE
  if (isset($_GET['sample'])){
    ?>
    <script>
      alert("Sample added Succesfully");
    </script>
    <?php
  }
?>
<html>
  <body>
    <div class="container">
      <div class="row">
        <form class="row row-cols-lg-auto g-3 justify-content-center" method="post" action="formsubmit.php">
          <div class="col-12">
            <div class="input-group">
              <input
              type="number"
              class="form-control"
              name="units"
              id="units"
              min="1"
              placeholder="Units"
              required
              />
              <div class="input-group-text">Units</div>
            </div>
          </div>

          <div class="col-12">
            <div class="input-group">
              
              <select class="form-select" aria-label="group" name="group" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
              <div class="input-group-text">Blood Group</div>
            </div>
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-danger">Add to Bank</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
  include 'footer.html';
?>