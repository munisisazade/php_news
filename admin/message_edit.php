<?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include("menu.php"); ?>
            <?php  ob_start();
            $edit_title = "Show message";

            ?>

            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                <h1><?php echo $edit_title ?></h1>
                <form action=""  method="post" class="form-group">
                    <?php
                    if ($_GET['edit']) {
                        $get_head = "SELECT * FROM `message` WHERE `id`=" . $_GET['edit'] . "";
                        $result = $mysqli->query($get_head);
                        foreach ($result as $key) {
                            echo '<input type="hidden" name="id" value="'.$_GET['edit'].'">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">name</label>
                                        <input type="text" name="name" value="'.$key['name'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $cur_error; ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" name="text" value="'.$key['email'].'"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" name="text" value="'.$key['phone'].'"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">message</label>
                                        <textarea name="" class="form-control" id="" cols="30" rows="10">'.$key['message'].'</textarea>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                    ';
                        };
                    }

                    ?>




                </form>


            </main>

        </div>
    </div>
<?php include("footer.php"); ?>