<?php
$head_class='active';
include("header.php") ?>
<?php
    if($_GET['id']){

        $query = "DELETE FROM `header` WHERE `id`=".$_GET['id'];

        $mysqli->query($query);


    }
?>

    <div class="container-fluid">
        <div class="row">
            <?php include("menu.php"); ?>
            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                <h1>Website header</h1>
                <a href="header_edit.php">
                    <button class="btn btn-success">New</button></a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <?php
                        $head = "SELECT * FROM `header`";
                        $header_result = $mysqli->query($head);
                        if ($header_result) {

                            echo '<thead>
                            <tr>
                                <th>#id</th>
                                <th>name</th>
                                <th>text</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>';
                            foreach ($header_result as $key) {
                                echo '<tr><td>' . $key['id'] . '</td>
                                <td>' . $key['name'] . '</td>
                                <td>' . $key['text'] . '</td>
                                <td><a href="header_edit.php?edit='.$key['id'].'" class="btn btn-info">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a><a href="header_list.php?id='.$key['id'].'" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Delete
                                    </a></td>
                            </tr>';
                            }
                            echo '</thbody>';
                        }
                        else {
                            echo "bads";
                        }
                        ?>
                    </table>
            </main>
        </div>
    </div>
