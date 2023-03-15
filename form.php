<style>
  <?php include 'show.css'; ?>
  <?php include 'index.css'; ?>
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

    if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['phone'])) 
    {
      $error = "Please fill in all required fields.";
      header("Location: form?error=".urlencode($error)."&fname=".urlencode($_POST['fname'])."&lname=".urlencode($_POST['lname'])."&email=".urlencode($_POST['email'])."&phone=".urlencode($_POST['phone']));
      exit;
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

<?php if (isset($_GET['error'])) { ?>
  <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php } ?>
  <div class="card-body">
    <form method="POST" action="">
    <?=$responseMsg?>
      <div class="form-group">
        <label for="fname">First Name</label>
        <input type="fname" class="form-control" id="fname" name="fname" value="<?php echo isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : ''; ?>">
        <!-- <span class="text-danger">
          fname must be required
        </span> -->
      </div>
      <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="lname" class="form-control" id="lname" name="lname" value="<?php echo isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
      </div>
      <div class="mt-3">
        <a href="/school/students"><button type="submit" class="btn btn-success" name="addRecord">Create</button></a>
      </div>
    </form>

    <!-- <script>
      function validateForm() 
      {
        var fname = document.forms[0]["fname"].value;
        var lname = document.forms[0]["lname"].value;
        var email = document.forms[0]["email"].value;
        var phone = document.forms[0]["phone"].value;

        if (fname == "" || lname == "" || email == "" || phone == "") {
          alert("Please fill out all fields");
          // here i can redirect my page with missing data of create page 
          return false;
        }
        return true;
      }
    </script> -->
  </div>