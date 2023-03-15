<style>
  <?php include 'show.css';
  ?><?php include 'index.css';
  ?>
</style>

<?php
$responseMsg = '';
$check=0;
if(isset($_POST['addRecord']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if ($fname == "" || $lname == "" || $email == "" || $phone == "") 
    {
      header("location: create");
    }
    else
    {
      $responseMsg = addRecords($fname, $lname, $email, $phone);
      header("Refresh: 1.2; url=/school/students");
    }
}

?>



<div class="card">

  <div class="card-title">
    <div class="back">
      <a href="/school/students"><button>Go back</button></a>
    </div>
    <div class="left">
      <p> Student&nbsp;|&nbsp;Create </p>
    </div>
  </div>

  <div class="card-body">
    <form method="POST" action="" onsubmit="return validateForm()">
      <?=$responseMsg?>
      <div class="form-group">
        <label for="fname">First Name</label>
        <input type="fname" class="form-control" id="fname" name="fname" placeholder="Enter First Name"
          value="<?php echo isset($_POST['fname'])?>">
      </div>
      <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="lname" class="form-control" id="lname" name="lname" placeholder="Enter last Name"
          value="<?php echo isset($_POST['lname'])?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
          value="<?php echo isset($_POST['email']) ?>">
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter your phone"
          value="<?php echo isset($_POST['phone']) ?>">
      </div>
      <div class="mt-3">
        <a href="/school/students"><button type="submit" class="btn btn-success" name="addRecord">Create</button></a>
      </div>
    </form>

    <script>
      function validateForm() {
        var fname = document.forms[0]["fname"].value;
        var lname = document.forms[0]["lname"].value;
        var email = document.forms[0]["email"].value;
        var phone = document.forms[0]["phone"].value;

        if (fname == "" || lname == "" || email == "" || phone == "") {
          alert("Please fill out all fields"); 
          return false;
        }
        return true;
      }
    </script>
  </div>