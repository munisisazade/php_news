<?php
$message_active='active';
include("header.php") ?>
<?php
if($_GET['id']){

    $query = "DELETE FROM `translate` WHERE `id`=".$_GET['id'];

    $mysqli->query($query);


}
?>

<div class="container-fluid">
    <div class="row">
        <?php include("menu.php"); ?>
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Messages</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <?php
                    $head = "SELECT * FROM `translate`";
                    $header_result = $mysqli->query($head);
                    if ($header_result) {

                        echo '<thead>
                            <tr>
                                <th>#id</th>
                                <th>model</th>
                                <th>name</th>
                                <th>language</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($header_result as $key) {
                            echo '<tr><td>' . $key['id'] . '</td>
                                <td>' . $key['title'] . '</td>
                                <td>' . $key['sub_title'] . '</td>
                                <td>' . $key['lang'] . '</td>
                                <td><a href="translation_edit.php?edit='.$key['id'].'" class="btn btn-info">
                                        <span class="glyphicon glyphicon-edit"></span> edit
                                    </a><a href="translation_list.php?id='.$key['id'].'" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Delete
                                    </a></td>
                            </tr>';
                        }
                        echo '</thbody>';
                    }
                    else {
                        echo "No translation find";
                    }
                    ?>
                </table>
        </main>
    </div>
</div>
