<style>
  <?php
  include 'listing.css';
  include 'index.css';
  ?>
</style>

<div class="card">

  <div class="card-title">
    <h4>Students</h4>
    <a href="/school/student/create"><button class="addStudent">Add Student</button></a>
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
          href="/school/student/page/<?= $current_page ?>">Previous</a></li>
      <?php } else { ?>
      <li class="page-item"><a class="page-link" href="/school/student/page/<?= $current_page -
          1 ?>">Previous</a></li>
      <?php } ?>

      <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
      <li class="page-item <?php if ($i == $current_page) { echo 'active'; } ?> "><a class="page-link" href="/school/student/page/<?= $i ?>">
          <?= $i ?>
        </a></li>
      <?php } ?>

      <?php if ($current_page == $total_pages) { ?>
      <li class="page-item" class='disabled'><a class="page-link" href="/school/student/page/<?= $current_page ?>">Next</a></li>
          <?php } else { ?>
            <li class="page-item"><a class="page-link" href="/school/student/page/<?= $current_page +
                1 ?>">Next</a></li>
      <?php } ?>
    </ul>
  </nav>


  <form method="POST" action="">
    <div class="input-group">
      <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
        aria-describedby="search-addon" />
      <button type="submit" name="submit" class="btn btn-outline-primary">search</button>
    </div>
  </form>



  <div class="card-body">
  <?php

if (isset($_POST['submit']))
{
  $username = $_POST['search'];
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
        $allRecord = getRecordByName($username);
        foreach ($allRecord as $row) { ?>
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
              <a href="student/show/<?= $row[
                  'id'
              ] ?>"><button class="btn1"><img src="<?=getCurrentPageURL(false)?>/school/show.png" alt="Qries" width="13px" height="13px"></button></a>
              &nbsp;
              <a href="student/edit/<?= $row[
                  'id'
              ] ?>"><button class="btn2"><img src="<?=getCurrentPageURL(false)?>/school/edit.png" alt="Qries" width="20px" height="20px"></button></a>
              &nbsp;
              <a href="student/del/<?= $row[
                  'id'
              ] ?>"><button class="btn3" name="del"><img src="<?=getCurrentPageURL(false)?>/school/del.png" alt="Qries" width="13px" height="13px">
                </button></a>
            </div>
          </td>

        </tr>
        <?php }}
        else{
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
        $data = getPersonData();
        foreach ($data as $row) { ?>
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
              <a href="student/show/<?= $row[
                  'id'
              ] ?>"><button class="btn1"><img src="<?=getCurrentPageURL(false)?>/school/show.png" alt="Qries" width="13px" height="13px"></button></a>
              &nbsp;
              <a href="student/edit/<?= $row[
                  'id'
              ] ?>"><button class="btn2"><img src="<?=getCurrentPageURL(false)?>/school/edit.png" alt="Qries" width="20px" height="20px"></button></a>
              &nbsp;
              <a href="student/del/<?= $row[
                  'id'
              ] ?>"><button class="btn3" name="del"><img src="<?=getCurrentPageURL(false)?>/school/del.png" alt="Qries" width="13px" height="13px">
                </button></a>
            </div>
          </td>
        </tr>
          <?php
        }}
        ?>
      </tbody>
    </table>
  </div>
</div>