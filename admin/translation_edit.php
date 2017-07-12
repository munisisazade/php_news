<?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include("menu.php"); ?>
            <?php  ob_start();
            global $mysqli;
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
                        <label for="exampleInputEmail1">Model</label>
                        <select class="form-control" name="" id="">
                            <option value="header">Headers</option>
                            <option value="article">News</option>
                            <option value="about">About</option>
                            <option value="flatpage">Flatpage</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input type="text" name="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Language</label>
                        <select class="form-control" name="" id="">
                            <option value="header">az</option>
                        </select>
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