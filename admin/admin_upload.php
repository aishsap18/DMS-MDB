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
<div class="col-xs-6">
   
        <form action="admin_upload_action.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <input type="file" name="fileToUpload" class="file hidden">
                    <div class="input-group">
      
                        <input type="text" id="input_browse" class="form-control" disabled placeholder="Upload document" name="doc_name">
                        <span class="input-group-btn">
                            <button class="browse btn" id="browse_button" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                        </span>
                    </div>
                </div>

                <input class="btn" id="add_button" type="submit" value="Upload document" name="submit">

        </form>
   
</div>
<script type="text/javascript">
    $(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});
$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});
</script>