<?php
	include("../include/config.php");
   	session_start();

   	$user = $_SESSION['admin_id'];

      $event_id = $_SESSION['event_id'];
      
      $sql2 = "SELECT * FROM dms_data_master";
      $retval2 = mysqli_query( $db,$sql2 );
      
      $dmid = "";
      while($row = mysqli_fetch_assoc($retval2)) {
         if ($row['admin_id']==$user && $row['event_id']==$event_id) {
            $dmid = $row['dm_id'];
            //echo $dmid." found";
            break;      
         }
      }
      if ($dmid=="") {
         $sql1 = "INSERT INTO dms_data_master (user_id,event_id) VALUES ( '$user','$event_id' )";
         $retval1 = mysqli_query( $db,$sql1 );  
         $sql3 = "SELECT dm_id FROM dms_data_master WHERE user_id='$user' AND event_id='$event_id'";
         $retval3 = mysqli_query( $db,$sql3 );
         $row = mysqli_fetch_array($retval3,MYSQLI_ASSOC);
         $dmid = $row['dm_id'];
         //echo $dmid." inserted and found";
      }
      
      //$info = pathinfo($_FILES['doc']['name']);
      //$ext = $info['extension']; // get the extension of the file
      //$newname = "newname.pdf"; 
      //$target = 'uploads/'.$newname;
      
      $target_dir = "../uploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      
      move_uploaded_file( $_FILES["fileToUpload"]["tmp_name"], $target_file);

      $temp = $_FILES["fileToUpload"]["name"];

   	$sql = "INSERT INTO dms_data (dm_id,filename) VALUES ( '$dmid','$temp' )";
      
   	//mysql_select_db('dms');
   	$retval = mysqli_query( $db,$sql );
   
   	if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   	}
   
   	//echo "Entered data successfully\n";


      //echo "<h3 align='center'>Upload successful.</h3> <script>setTimeout(\"location.href = 'home.php';\",2500);</script>";
      echo "<script>alert('Upload successful.'); location.href=\"../admin/admin_home.php\"; </script>";
?>

