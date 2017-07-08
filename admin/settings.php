<?php include("header.php");
$con = new mysqli("localhost","php_user","RkZmUpHmZwAekaLn","php_news_usta");
$con->set_charset("utf8");
?>

<div class="container-fluid">
    <div class="row">
<?php include("menu.php"); ?>
        <?php
            if(isset($_POST['settings'])) {
                $user_id = (int) $_POST['id'];
                $name = check_input($_POST['name']);
                $surname = check_input($_POST['surname']);
                $email = check_input($_POST['email']);
                if ($user_id && $name && $surname && $email) {
                    $find = "UPDATE `users` SET `name`='".$name."', `surname`='".$surname."' , `email`='".$email."' WHERE `id`='".$user_id."' ";
                    if ($con->query($find) === TRUE) {
                        $message = "<b class='text-success text-center'>Successfuly update</b>";
                    }
                    else {
                        $message = "<b class='text-danger text-center'>Mysql connection problem</b>";
                    }
                }
                else {
                    $message = "<b class='text-danger text-center'>Username and email not update!</b>";
                }





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
            <h1>User Settings</h1>
            <?php
                $query = "SELECT * FROM `users` WHERE id='".$_SESSION['session_id']."'";
                $result_user = $con->query($query);
                $countQuery = $result_user->num_rows;
//                var_dump($result_user);
                echo $message;
                if($countQuery == 1){
                    foreach ($result_user as $key) {
                        echo '<form action=""  method="post" class="form-group">
                <input type="hidden" name="id" value="'.$key['id'].'">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="'.$key['name'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Surname</label>
                    <input type="text" name="surname" value="'.$key['surname'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" value="'.$key['email'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <input type="submit" name="settings" class="btn btn-success">
            </form>';
                    }
                }
                else {
                    echo $con->error;
                }

            ?>

        </main>

    </div>
</div>
<?php include("footer.php"); ?>