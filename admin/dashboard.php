<?php include("header.php"); ?>
<?php include("menu.php"); ?>
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Welcome to Dashboard <?php global $user; echo $user['name'] . " " . $user['surname']; ?></h1>
        <ul class="nav nav-pills mobile_show flex-column">
            <li class="nav-item">
                <a class="nav-link " href="user_list.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="header_list.php">Headers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="news_list.php">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="flatpage_list.php">Flatpages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="about_list.php">About me</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="message_list.php">Messages</a>
            </li>

        </ul>
    </main>
<?php include("footer.php"); ?>