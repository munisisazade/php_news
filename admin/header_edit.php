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
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#english" role="tab" data-toggle="tab">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#azeri" role="tab" data-toggle="tab">Azərbaycan</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="english" aria-expanded="true">
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
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="azeri">
                        <form action=""  method="post" class="form-group">
                            <?php
                            if ($_GET['edit']) {
                                $get_head = "SELECT * FROM `header` WHERE `id`=" . $_GET['edit'] . "";
                                $result = $mysqli->query($get_head);
                                foreach ($result as $key) {
                                    echo '<input type="hidden" name="id" value="'.$_GET['edit'].'">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ad</label>
                                        <input type="text" name="name" value="'.$key['name'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sub text</label>
                                        <input type="text" name="text" value="'.$key['text'].'"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>';
                                };
                            }
                            else {
                                echo '
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ad</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sub text</label>
                                        <input type="text" name="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>';
                            }
                            ?>



                            <input type="submit" name="change" class="btn btn-success">
                        </form>
                    </div>
                </div>



            </main>

        </div>
    </div>
<?php include("footer.php"); ?>