<?php
$user_result_class='active';
include("header.php") ?>
<?php
global $mysqli;

?>

<div class="container-fluid">
    <div class="row">
        <?php include("menu.php"); ?>
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Admin list</h1>
            <a href="user_edit.php">
                <button class="btn btn-success">New</button></a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <?php
                    $user_query = "SELECT * FROM `users`";
                    $user_result = $mysqli->query($user_query);
                    if ($user_result) {

                        echo '<thead>
                            <tr>
                                <th>#id</th>
                                <th>full name</th>
                                <th>email</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($user_result as $key) {
                            echo '<tr><td>' . $key['id'] . '</td>
                                <td>'. $key['name'] . " " . $key['surname'] . '</td>
                                <td>' . $key['email'] . '</td>
                                <td><a href="user_edit.php?edit='.$key['id'].'" class="btn btn-info">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a></td>
                            </tr>';
                        }
                        echo '</thbody>';
                    }
                    else {
                        echo "No users found";
                    }
                    ?>
                </table>
        </main>
    </div>
</div>
