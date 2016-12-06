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
<div class="col-xs-10">
<form action="add_user_action.php" method="post">
    Full Name : <input type="text" name="fullname">
    Username : <input type="text" name="username">
    Password : <input type="text" name="password">
    <input type="submit" value="Add User" id="add_button" class="btn">
</form>
</div>