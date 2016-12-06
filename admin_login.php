<?php
include("include/config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT admin_id FROM dms_admin WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    echo $count."\n";
    echo $row['admin_id']."\n";
    echo $row['username']."\n";
    if($count == 1) {
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['username'] = $myusername;
            header("location: admin/admin_home.php");
    }else {
        echo "error"."\n";
        //echo "<script>alert('Enter correct username and password'); location.href=\"index.html\"; </script>";
    }
}
?>