<?php
    include("../include/config.php");
    session_start();

    if (isset($_SESSION['admin_id'])) {
        
    }
    else{
        header("location: ../index.html");
    }
include("../include/master.php");
$sql = "SELECT eventname FROM dms_event";
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)) { 
        $summary = implode($row);  
        
        echo "<div class='col-xs-2'>
                <div class='text-center'>
                <form action='admin_display_all.php' method='post'>
                    <input type='hidden' name='action' value='submit' />
                    <input type='submit' name='submit' value='".$summary."' id='folder_button' class='btn' onclick='location.href='display_all.php';'>"
                ."</form>
                </div>
            </div>";
    }

?>