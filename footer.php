        <!-- Footer -->

        <?php
        include('mysqli_connect.php');
        $link = "SELECT * FROM `about`";
        $result = $mysqli->query($link);
        function social_link() {
            global $result;
            foreach ($result as $key) {
                return $key;
            }
        };
        $data = social_link();
        ?>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <ul class="list-inline text-center">
                            <li>
                                <a href="<?php echo $data['tw_link'];?>">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $data['fb_link'];?>">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $data['git_link'];?>">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                        </span>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted"><?php echo $language->getCopyright(); ?> <?php $time = time();$check = $time+date("Z",$time);echo strftime("%Y", $check); ?></p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="/js/jqBootstrapValidation.js"></script>
        <script src="/js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="/js/clean-blog.min.js"></script>
    </body>
</html>
<?php include("mysqli_close.php");?>