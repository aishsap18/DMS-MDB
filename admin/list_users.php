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
<th>User Id</th>
<th>Full Name</th>
<th>Username</th>
<th>Password</th>

<?php 

$sql = "SELECT * FROM dms_users";
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)) { 
        
        echo "<tr>
            <td>".$row['user_id']."</td>
            <td>".$row['fullname']."</td>
            <td>".$row['username']."</td>
            <td>".$row['password']."</td>
        </tr>";
    }

?>
</table>
</div>