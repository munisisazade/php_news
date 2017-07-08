<?php
$news_class='active';
include("header.php") ?>
<?php
if($_GET['id']){

    $query = "DELETE FROM `article` WHERE `id`=".$_GET['id'];

    $mysqli->query($query);


}
?>

<div class="container-fluid">
    <div class="row">
        <?php include("menu.php"); ?>
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Blog posts</h1>
            <a href="news_edit.php">
                <button class="btn btn-success">New</button></a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <?php
                    $head = "SELECT * FROM `article`";
                    $header_result = $mysqli->query($head);
                    if ($header_result) {

                        echo '<thead>
                            <tr>
                                <th>#id</th>
                                <th>picture</th>
                                <th>title</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($header_result as $key) {
                            echo '<tr><td>' . $key['id'] . '</td>
                                <td><img width="200px" src="../' . $key['image'] . '" alt="news"></td>
                                <td>' . $key['title'] . '</td>
                                <td><a href="news_edit.php?edit='.$key['id'].'" class="btn btn-info">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a><a href="news_list.php?id='.$key['id'].'" class="btn btn-danger">
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
