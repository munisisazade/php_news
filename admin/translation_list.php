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
            <h1>Translation</h1>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#header" role="tab" data-toggle="tab">Headers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#news" role="tab" data-toggle="tab">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#flatpages" role="tab" data-toggle="tab">Flatpages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about" role="tab" data-toggle="tab">About</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active show" id="header" aria-expanded="true">
                    <a href="translation_edit.php?create_header=true"><button class="btn btn-success">New</button></a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <?php
                            $head = "SELECT * FROM `translate`";
                            $header_result = $mysqli->query($head);
                            if ($header_result) {

                                echo '<thead>
                            <tr>
                                <th>#id</th>
                                <th>name</th>
                                <th>text</th>
                                <th>lang</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>';
                                foreach ($header_result as $key) {
                                    echo '<tr><td>' . $key['id'] . '</td>
                                <td>' . $key['name'] . '</td>
                                <td>' . $key['text'] . '</td>
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
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="news">
                    <a href="translation_edit.php?create_news=true"><button class="btn btn-success">New</button></a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <?php
                            $head = "SELECT * FROM `translate`";
                            $header_result = $mysqli->query($head);
                            if ($header_result) {

                                echo '<thead>
                            <tr>
                                <th>#id</th>
                                <th>title</th>
                                <th>lang</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>';
                                foreach ($header_result as $key) {
                                    echo '<tr><td>' . $key['id'] . '</td>
                                <td>' . $key['title'] . '</td>
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
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="flatpages">
                    <a href="translation_edit.php?create_flatpage=true"><button class="btn btn-success">New</button></a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <?php
                            $head = "SELECT * FROM `translate`";
                            $header_result = $mysqli->query($head);
                            if ($header_result) {

                                echo '<thead>
                            <tr>
                                <th>#id</th>
                                <th>name</th>
                                <th>lang</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>';
                                foreach ($header_result as $key) {
                                    echo '<tr><td>' . $key['id'] . '</td>
                                <td>' . $key['name'] . '</td>
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
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="about">
                    <a href="translation_edit.php?create_about=true"><button class="btn btn-success">New</button></a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <?php
                            $head = "SELECT * FROM `translate`";
                            $header_result = $mysqli->query($head);
                            if ($header_result) {

                                echo '<thead>
                            <tr>
                                <th>#id</th>
                                <th>title</th>
                                <th>sub_title</th>
                                <th>lang</th>
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
                    </div>
                </div>
            </div>


        </main>
    </div>
</div>
