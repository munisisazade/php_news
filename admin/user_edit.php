<?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include("menu.php"); ?>
            <?php  ob_start();
            global $mysqli;
            $edit_title = "Create new user";
            if ($_GET['edit']) {
                $edit_title = "Edit user";
            }
            if(isset($_POST['change'])) {
                $id = (int) $_POST['id'];
                $name = check_input($_POST['name']);
                $surname = check_input($_POST['surname']);
                $username = check_input($_POST['username']);
                $email = check_input($_POST['email']);
                $password = md5(check_input($_POST['password']));

                if ($id) {
                    $edit_query = "UPDATE `users` SET `name`='".$name."' , `surname`='".$surname."',`username`='".$username."' ,`email`='".$email."'  WHERE `id`=".$id."";
                    $mysqli->query($edit_query);
                    get_user_list();
                }
                else {
                    $edit_query = "INSERT INTO `users`(`name`,`surname`,`username`,`password`,`email`) VALUES ('".$name."','".$text."','".$username."','".$password."','".$email."')";
                    $res = $mysqli->query($edit_query);
                    get_user_list();
                }

            }
            function check_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = strip_tags($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            function get_user_list() {
                header("Location: user_list.php");
            }
            ?>

            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                <h1><?php echo $edit_title ?></h1>
                <form action=""  method="post" class="form-group">
                    <?php
                    if ($_GET['edit']) {
                        $get_head = "SELECT * FROM `users` WHERE `id`=" . $_GET['edit'] . "";
                        $result = $mysqli->query($get_head);
                        foreach ($result as $key) {
                            echo '<input type="hidden" name="id" value="'.$_GET['edit'].'">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">name</label>
                                        <input type="text" name="name" value="'.$key['name'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">surname</label>
                                        <input type="text" name="surname" value="'.$key['surname'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">email</label>
                                        <input type="text" name="email" value="'.$key['email'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">username</label>
                                        <input type="text" name="username" value="'.$key['username'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">password</label>
                                        <a href="change_password.php?user_id='.$key['id'].'">Change current password this form</a>
                                        <small id="emailHelp" class="form-text text-muted"> Your current password is MD5 hash: '.$key['password'].'</small>
                                    </div>';
                        };
                    }
                    else {
                        echo '
                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">surname</label>
                        <input type="text" name="surname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">email</label>
                        <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">username</label>
                        <input type="text" name="username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">password</label>
                        <input type="password" name="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    
                    ';
                    }
                    ?>
                    <input type="submit" name="change" class="btn btn-success">
                </form>


            </main>

        </div>
    </div>
<?php include("footer.php"); ?>