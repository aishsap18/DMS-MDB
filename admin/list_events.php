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
<table border="1px solid black">
<th>Event Id</th>
<th>Event Name</th>
<th>Description</th>

<?php 

$sql = "SELECT * FROM dms_event";
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)) { 
        
        echo "<tr>
            <td>".$row['event_id']."</td>
            <td>".$row['eventname']."</td>
            <td>".$row['description']."</td>
        </tr>";
    }

?>
</table>
</div>