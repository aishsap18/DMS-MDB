
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document Management System</title>

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="css/new_style.css" rel="stylesheet">


</head>

<body>

<div>
    <div class="row">
        <div class="col-xs-2">
            <h4><a href="../user/home.php"><i class="fa fa-home"></i>Home</a></h4>
        </div>
        <div class="col-xs-8">
            <div id="search" class="lg-form">
                <input type="search" class="form-control" placeholder="Search" />
            </div>
        </div>
        <div class="col-xs-2">
            <div class="text-center">
                <form action="../logout.php">
                    <input id="logout_button" class="btn" style="margin-top:20px;" type="submit" value="Logout">
                </form>
            </div>
        </div>
    </div>

    <hr class="style-4">

</div>

<div class="row">
<div class="col-xs-2">
    <nav class="nav-sidebar">
        <ul class="nav">
            <li class="active"><a>Events</a></li>

            <?php
            $sql = "SELECT eventname FROM dms_event";
            $result = mysqli_query($db,$sql);

            while($row = mysqli_fetch_assoc($result)) {
                $summary = implode($row);

                echo "<li>

                                        <form action='../user/display_all.php' method='post'>
                                            <input type='hidden' name='action' value='submit' />
                                            <input type='submit' name='submit' value='" .$summary."' id='side' onclick='location.href='display_all.php';'>"
                    ."</form>

                                </li>";
            }

            ?>

            <li class="nav-divider"></li>

            <li><a href="javascript:;">Privacy</a></li>
            <li><a href="javascript:;">Settings</a></li>
        </ul>
    </nav>
</div>

<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="../js/jquery.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<!-- Material Design Bootstrap -->
<script type="text/javascript" src="../js/mdb.js"></script>


</body>

</html>