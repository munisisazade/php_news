<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/"><?php echo $language->getWebsiteName(); ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class='dropdown'>
                    <a class="bg-trns bg-transparent" data-toggle="dropdown">Language
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php change_language("az"); ?>">az</a></li>
                        <li><a href="<?php change_language("en"); ?>">en</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/"><?php echo $language->getMenuTitle(); ?></a>
                </li>
                <li>
                    <a href="/<?php echo $_SESSION['lang']; ?>/about-us/"><?php echo $language->getMenuAbout(); ?></a>
                </li>
                <?php
                    include("mysqli_connect.php");
                    global $mysqli;
                    if ($_SESSION['lang'] != 'en') {
                        $flatpage_query = "SELECT * FROM `flatpage` JOIN `translate` ON `translate`.flatpage_id=`flatpage`.id";
                        $result = $mysqli->query($flatpage_query);
                        foreach ($result as $item) {
                            echo '<li>
                                 <a href="/'. $_SESSION['lang'] .'/page' . $item['url'] . '">' . $item['name'] . '</a>
                              </li>';
                        }
                    }
                    else {
                        $flatpage_query = "SELECT * FROM `flatpage`";
                        $result = $mysqli->query($flatpage_query);
                        foreach ($result as $item) {
                            echo '<li>
                                 <a href="/'. $_SESSION['lang'] .'/page' . $item['url'] . '">' . $item['name'] . '</a>
                              </li>';
                        }
                    }
                ?>
                <li>
                    <a href="/<?php echo $_SESSION['lang']; ?>/contact/"><?php echo $language->getContact(); ?></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>