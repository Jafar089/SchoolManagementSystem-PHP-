<div class="card">

    <div class="card-title">
      <h4>Students</h4>
      <a href="/school/students/create"><button class="addStudent">Add Student</button></a>
    </div>

    <div class="card-body">
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
        foreach($data as $row)
        {
        ?>
          <tr>
            <td>
              <?=$row['fname']." ".$row['lname']?>
            </td>
            <td>
              <?=$row['email']?>
            </td>
            <td>
              <?=$row['phone']?>
            </td>
            <td>
              <?=$row['created_at_formatted']?>
            </td>
            <td>
              <div class="btns">
                <a href="students/show/<?=$row['id']?>"><button class="btn1"><img src="show.png" alt="Qries" width="13px"
                      height="13px"></button></a> &nbsp;
                <a href="students/edit/<?=$row['id']?>"><button class="btn2"><img src="edit.png" alt="Qries" width="20px"
                      height="20px"></button></a> &nbsp;
                <a href="students/del/<?=$row['id']?>"><button class="btn3" name="del"><img src="del.png" alt="Qries"
                      width="13px" height="13px"> </button></a>
              </div>
            </td>

          </tr>
          <?php
        }
        ?>
        </tbody>
      </table>
      </div>
    </div>