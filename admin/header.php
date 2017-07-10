<?php include("../mysqli_connect.php");?>
<?php session_start();?>
<?php
if(!isset($_SESSION['session_id'])){
    header("Location: index.php");
    exit();
}
?>
<?php include("get_user_for_session.php");
    $user = get_user();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin panel | <?php echo $user['name']." ".$user['surname'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="https://v4-alpha.getbootstrap.com/examples/dashboard/dashboard.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css">
    <script src="../js/min/assets/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>
    <script src="../js/datetime-picker.js"></script>
    <script src="../js/ckeditor/ckeditor/ckeditor.js"></script>
    <script src="../js/ckeditor/ckeditor-init.js"></script>

    <![endif]-->
    <style>
        .login {
            width: 300px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Dashboard</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $_SERVER['REQUEST_URI'] ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="settings.php">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="change_password.php">Change password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/php_news/">View site</a>
            </li>

            <li>
                <a class="nav-link" href="settings.php"><?php echo $user['name']." ".$user['surname'];?></a>
            </li>
            <li><a class="nav-link" href="logout.php">Log Out</a></li>
        </ul>

    </div>
</nav>
