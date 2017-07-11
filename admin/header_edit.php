<?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include("menu.php"); ?>
            <?php  ob_start();
            $edit_title = "New header add";
            if ($_GET['edit']) {
                $edit_title = "Edit header";
            }
            if(isset($_POST['change'])) {
                $id = (int) $_POST['id'];
                $name = check_input($_POST['name']);
                $text = check_input($_POST['text']);

                if ($id) {
                    $edit_query = "UPDATE `header` SET `name`='".$name."' , `text`='".$text."' WHERE `id`=".$id."";
                    $mysqli->query($edit_query);
                    get_list();
                }
                else {
                    $edit_query = "INSERT INTO `header`(`name`,`text`) VALUES ('".$name."','".$text."')";
                    $res = $mysqli->query($edit_query);
                    get_list();
                }
                echo isset($_SESSION['session_id']);
//                function check_current_password($pass) {
//                    global $con;
//                    $mdfive = md5($pass);
//                    $queries = "SELECT * FROM `users` WHERE `password`='".$mdfive."'";
//                    var_dump($con->query($queries));
//                    var_dump($mdfive);
//                    var_dump($queries);
//                    if ($con->query($queries) === TRUE) {
//                        return true;
//                    }
//                    else {
//                        return false;
//                    }
//                }
//
//                if (check_current_password($current_pass)) {
//                    $cur_error = md5($current_pass);
//                }
//                else {
//                    $cur_error = md5($current_pass);
//                }

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
            function get_list() {
                header("Location: header_list.php");
            }
            ?>

            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                <h1><?php echo $edit_title ?></h1>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>HOME</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>Menu 1</h3>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
                <form action=""  method="post" class="form-group">
                <?php
                    if ($_GET['edit']) {
                        $get_head = "SELECT * FROM `header` WHERE `id`=" . $_GET['edit'] . "";
                        $result = $mysqli->query($get_head);
                        foreach ($result as $key) {
                                echo '<input type="hidden" name="id" value="'.$_GET['edit'].'">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">name</label>
                                        <input type="text" name="name" value="'.$key['name'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">text</label>
                                        <input type="text" name="text" value="'.$key['text'].'"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>';
                        };
                    }
                    else {
                        echo '
                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">text</label>
                        <input type="text" name="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>';
                    }
                ?>



                    <input type="submit" name="change" class="btn btn-success">
                </form>


            </main>

        </div>
    </div>
<?php include("footer.php"); ?>