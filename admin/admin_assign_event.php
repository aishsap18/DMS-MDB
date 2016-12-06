<?php
include("../include/config.php");
session_start();

if (isset($_SESSION['admin_id'])) {

}
else{
    header("location: ../index.html");
}

include("../include/master.php");
?>

<div class="row">
    <form action="assign_event_action.php" method="post">
<div class="col-xs-3">

    <label>Select User</label>
    <?php

    $sql = "SELECT * FROM dms_users";
    $result = mysqli_query($db,$sql);

    ?>
    <select class="selectpicker form-control" title="Choose User" data-size="6" name="user_select">
        <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<option>".$row['fullname']."</option>";
        }
        ?>
    </select>
</div>

    <div class="col-xs-3">

        <label>Select Event</label>
        <?php

        $sql = "SELECT * FROM dms_event";
        $result = mysqli_query($db,$sql);

        ?>
        <select class="selectpicker form-control" title="Choose Event" data-size="6" name="event_select">
            <?php
            while($row = mysqli_fetch_assoc($result)){
                echo "<option>".$row['eventname']."</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-xs-2">

            <input type="submit" class="btn" id="sample_button" value="Assign">

    </div>
    </form>
</div>