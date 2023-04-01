<style>
    <?php include 'show.css';
     include 'index.css';
    ?>
</style>

<div class="card">

    <div class="card-title">
        <div class="back">
            <a href="/school/student"><button>Go back</button></a>
        </div>
        <div class="left">
            <p> Student&nbsp;|&nbsp;Details </p>
        </div>
    </div>

    <div class="card-body">
        <?php
            $id = 0;
            if (isset($_GET['url'])) {
                $url = $_SERVER['REQUEST_URI'];
                $regex = '/\/show\/(\d+)/';
                preg_match($regex, $url, $matches);
                $id = $matches[1];
                $getRecord = getRecord($id);
                if ($getRecord > 0) { ?>
        <form action="">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="fname" class="form-control" id="fname" name="fname" value="<?= $getRecord[0]['fname'] ??
                            null ?>" disabled placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="lname" class="form-control" id="lname" name="lname" value="<?= $getRecord[0][
                            'lname'
                        ] ?>" disabled placeholder="Enter last Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $getRecord[0][
                            'email'
                        ] ?>" disabled placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" value="<?= $getRecord[0][
                            'phone'
                        ] ?>" disabled placeholder="Enter your phone number">
            </div>
        </form>
        <div class="mt-3">
            <a href="/school/student/edit/<?= $id ?>"><button type="submit" class="btn btn-primary"
                    name="edit">Edit</button></a>
        </div>
        <?php } else {echo '<script>swal("Record not found", "Your Record Not Exist", "danger");</script>';}
            } else {
                echo '<div class="mt-3 mb-3 alert alert-danger" role="alert">
            ID Not Get
          </div>';
            }
            ?>
    </div>