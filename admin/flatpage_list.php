<?php
$flat_class='active';
include("header.php") ?>
<?php
if($_GET['id']){

    $query = "DELETE FROM `flatpage` WHERE `id`=".$_GET['id'];

    $mysqli->query($query);


}
?>

<div class="container-fluid">
    <div class="row">
        <?php include("menu.php"); ?>
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Flatpages list</h1>
            <a href="flatpage_edit.php">
                <button class="btn btn-success">New</button></a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <?php
                    $flat = "SELECT * FROM `flatpage`";
                    $flat_result = $mysqli->query($flat);
                    if ($flat_result) {

                        echo '<thead>
                            <tr>
                                <th>#id</th>
                                <th>#picture</th>
                                <th>url</th>
                                <th>name</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($flat_result as $key) {
                            echo '<tr><td>' . $key['id'] . '</td>
                                <td><img width="200px" src="../'.$key['image'].'" alt="Flat page"></td>
                                <td>' . $key['url'] . '</td>
                                <td>' . $key['title'] . '</td>
                                <td><a href="flatpage_edit.php?edit='.$key['id'].'" class="btn btn-info">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a><a href="flatpage_list.php?id='.$key['id'].'" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Delete
                                    </a></td>
                            </tr>';
                        }
                        echo '</thbody>';
                    }
                    else {
                        echo "No result found";
                    }
                    ?>
                </table>
        </main>
    </div>
</div>
