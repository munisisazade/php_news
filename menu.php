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
                <li><a href="" data-toggle="dropdown">Dropdown Example
                        <span class="caret"></span>
                        <ul class="dropdown-menu">
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">JavaScript</a></li>
                        </ul>
                    </a></li>
                <li>
                    <a href="/"><?php echo $language->getMenuTitle(); ?></a>
                </li>
                <li>
                    <a href="/about-us/"><?php echo $language->getMenuAbout(); ?></a>
                </li>
                <?php
                    include("mysqli_connect.php");
                    global $mysqli;
                    $flatpage_query = "SELECT * FROM `flatpage`";
                    $result = $mysqli->query($flatpage_query);
                    foreach ($result as $item) {
                        echo '<li>
                                 <a href="/page'.$item['url'].'">'.$item['name'].'</a>
                              </li>';
                    }
                ?>
                <li>
                    <a href="/contact/"><?php echo $language->getContact(); ?></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>