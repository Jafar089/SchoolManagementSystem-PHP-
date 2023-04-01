<style>
  <?php include 'listing.css';
  include 'index.css';
  ?>
</style>

<div class="card">

  <div class="card-title">
    <h4>Students</h4>
    <a href="/school/students/create"><button class="addStudent">Add Student</button></a>
  </div>

  <?php
  $total_pages = totalPages();
  $current_page = currentPage();
  $record_per_page = recordPerPage();
  ?>

  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <?php if ($current_page == 1) { ?>
      <li class="page-item" class='disabled'><a class="page-link"
          href="/school/students/page/<?= $current_page ?>">Previous</a></li>
      <?php } else { ?>
      <li class="page-item"><a class="page-link" href="/school/students/page/<?= $current_page -
          1 ?>">Previous</a></li>
      <?php } ?>
      <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
      <li class="page-item"><a class="page-link" href="/school/students/page/<?= $i ?>">
          <?= $i ?>
        </a></li>
      <?php } ?>
      <li class="page-item"><a class="page-link" href="/school/students/page/<?= $current_page +
          1 ?>">Next</a></li>
    </ul>
  </nav>


  <form method="POST" action="">
    <div class="input-group">
      <input type="search" name="name" class="form-control rounded" placeholder="Search" aria-label="Search"
        aria-describedby="search-addon" />
      <button type="submit" name="search" class="btn btn-outline-primary">search</button>
    </div>
  </form>




  <div class="card-body">

  <!-- <script>
    // let myUsername = document.getElementById('name');
    // console.log(myUsername);
    function myFunction() 
    {
      let myUsername = document.getElementById('name');
      console.log(myUsername);
      // Get the value of the "fname" input field
      // var firstName = form.elements["name"].value;
      // console.log(firstName);
      
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    xhttp.open("POST", "searching.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("function=" + myFunction.toString());

  </script> -->
  

  <?php
  // if (isset($_GET['url'])) 
  // {
  //   $username = $_POST['name'];
  //   echo $username;
  // }
  // $username = '';

  // if(isset($_POST['search']))
  // {
  //   $username = $_POST['name'];
  //   echo $username;
  // }


  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $username = $_POST['name'];
    echo $username;
  }

  // $username = "Hamza Qari Shah";
  // $var = $_POST['function'];
  $allRecord = getRecordByName($username);
?>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Full Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Added On</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ((array) $allRecord as $row) { ?>
        <tr>
          <td>
            <?= $row['fname'] . ' ' . $row['lname'] ?>
          </td>
          <td>
            <?= $row['email'] ?>
          </td>
          <td>
            <?= $row['phone'] ?>
          </td>
          <td>
            <?= $row['created_at_formatted'] ?>
          </td>
          <td>
            <div class="btns">
              <a href="students/show/<?= $row[
                  'id'
              ] ?>"><button class="btn1"><img src="show.png" alt="Qries" width="13px" height="13px"></button></a>
              &nbsp;
              <a href="students/edit/<?= $row[
                  'id'
              ] ?>"><button class="btn2"><img src="edit.png" alt="Qries" width="20px" height="20px"></button></a>
              &nbsp;
              <a href="students/del/<?= $row[
                  'id'
              ] ?>"><button class="btn3" name="del"><img src="del.png" alt="Qries" width="13px" height="13px">
                </button></a>
            </div>
          </td>

        </tr>
        <?php }
        ?>
      </tbody>
    </table>
  </div>
</div>