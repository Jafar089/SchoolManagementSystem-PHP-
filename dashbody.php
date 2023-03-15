<div class="con">
    <div class="box">
        <?php
            $total = returnStudent();
            $last = Studentlast();
        ?>
        <p> <b>Total Students </b> <br><br>&nbsp;
            <?php echo $total ?>
        </p>
    </div>
    <div class="box">
        <p> <b>New Students</b> <small>(last 7 days)</small> <br><br>&nbsp;
            <?php echo $last ?>
        </p>
    </div>
</div>