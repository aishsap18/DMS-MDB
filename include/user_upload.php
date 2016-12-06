<?php
if (isset($_POST['action'])) {

    $eventname = mysqli_real_escape_string($db,$_POST['submit']);
    //echo $eventname;

    $sql = "SELECT event_id FROM dms_event WHERE eventname='$eventname'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $_SESSION['event_id'] = $row['event_id'];
    $event_id = $_SESSION['event_id'];
}
//include("../include/user_master.php");
?>
 <div class="col-xs-6">
        <form class="form-inline" action="user_upload_action.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="fileToUpload" class="file hidden">
                <div class="input-group-sm">
                    <input type="text" id="input_browse" class="form-control" disabled placeholder="Upload document" name="doc_name">
                    <button class="browse btn" id="browse_button" type="button">Browse</button>
                    <input class="btn" id="add_button" type="submit" value="Upload document" name="submit">
                </div>
            </div>

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