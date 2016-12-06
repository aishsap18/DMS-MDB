<?php
    include("../include/config.php");
    session_start();

    if (isset($_SESSION['admin_id'])) {
        $user = $_SESSION['admin_id'];
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

    $sql1 = "SELECT dm_id FROM dms_data_master WHERE event_id='$event_id'";
    $result1 = mysqli_query($db,$sql1);
}
include("../include/master.php");

        $count = 0;

        while ( $row1 = mysqli_fetch_assoc($result1)) {

           // echo $row1['dm_id'] . " row1"."<br />";
            $sql3 = "SELECT * FROM dms_data";
            $retval3 = mysqli_query( $db,$sql3 );
        while($row = mysqli_fetch_assoc($retval3)) {
                
             //   echo $row['dm_id'] . " row"."<br />";
            
                if ($row1['dm_id']==$row['dm_id']) {
                    if ($count==5) {
                        echo "<div class=row></div><div class=col-xs-2></div>";
                    }   
            
                    echo "<div class=col-xs-2><a href='/DMS-MDB/uploads/" . $row['filename'] . "'>
                        <img src='/DMS-MDB/uploads/".$row['filename']."' height='150' width='100%' />"
                        .$row['filename']."</div>";
                    $count++;
                    }
                }
            }

            //echo $row['filename'];
    ?>