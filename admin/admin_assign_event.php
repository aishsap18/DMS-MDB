<?php
include("../include/config.php");
session_start();

if (isset($_SESSION['admin_id'])) {

}
else{
    header("location: ../index.html");
}
if (isset($_POST['action'])) {

    $eventname = mysqli_real_escape_string($db,$_POST['submit']);
    //echo $eventname;

    $sql = "SELECT event_id FROM dms_event WHERE eventname='$eventname'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $_SESSION['event_id'] = $row['event_id'];
    $event_id = $_SESSION['event_id'];
}
include("../include/master.php");
?>

<div class="row">
<div class="col-xs-3">
<select class="selectpicker form-control">
    <option>Mustard</option>
    <option>Ketchup</option>
    <option>Relish</option>
</select>
</div>
</div>