<?php include("header.php");
$con = new mysqli("localhost","php_user","RkZmUpHmZwAekaLn","php_news_usta");
$con->set_charset("utf8");
?>

    <div class="container-fluid">
        <div class="row">
            <?php include("menu.php"); ?>
            <?php
            if(isset($_POST['change'])) {
                $current_pass = $_POST['current'];
                $name = check_input($_POST['name']);
                $surname = check_input($_POST['surname']);
                $email = check_input($_POST['email']);
                function check_current_password($pass) {
                    global $con;
                    $mdfive = md5($pass);
                    $queries = "SELECT * FROM `users` WHERE `password`='".$mdfive."'";
                    var_dump($con->query($queries));
                    var_dump($mdfive);
                    var_dump($queries);
                    if ($con->query($queries) === TRUE) {
                        return true;
                    }
                    else {
                        return false;
                    }
                }

                if (check_current_password($current_pass)) {
                    $cur_error = md5($current_pass);
                }
                else {
                    $cur_error = md5($current_pass);
                }

//                if ($user_id && $name && $surname && $email) {
//                    $find = "UPDATE `users` SET `name`='".$name."', `surname`='".$surname."' , `email`='".$email."' WHERE `id`='".$user_id."' ";
//                    if ($con->query($find) === TRUE) {
//                        $message = "<b class='text-success text-center'>Successfuly update</b>";
//                    }
//                    else {
//                        $message = "<b class='text-danger text-center'>Mysql connection problem</b>";
//                    }
//                }
//                else {
//                    $message = "<b class='text-danger text-center'>Username and email not update!</b>";
//                }





            }
            function check_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = strip_tags($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            ?>

            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                <h1>Change admin password</h1>
                 <form action=""  method="post" class="form-group">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Current password</label>
                    <input type="password" name="current" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter current password">
                    <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">New password</label>
                    <input type="password" name="surname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New password">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Repeat new password</label>
                    <input type="password" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="repeat new password">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <input type="submit" name="change" class="btn btn-success">
            </form>


            </main>

        </div>
    </div>
<?php include("footer.php"); ?>