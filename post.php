<?php include("header.php"); ?>
<?php include("menu.php");
    if($_GET['post_slug']) {
//        echo $_GET['post_id'];
        $get_post = "SELECT * FROM `article` WHERE `slug`='".$_GET['post_slug']."'";
        $result = $mysqli->query($get_post);
        function get_data() {
            global $result;
            foreach ($result as $key) {
                return $key;
            }
        };
        function get_user_full_name($user) {
            $id = (int) $user;
            global $mysqli;
            $author = "SELECT `name`,`surname` FROM `users` WHERE `id`=".$id."";
            $author_result = $mysqli->query($author);
            foreach ($author_result as $key) {
                $name = $key['name']." ".$key['surname'];
                return $name;
            }
        }
        $data = get_data();
        $author_name = get_user_full_name($data['author_id']);

    }


?>



<header class="intro-header" style="background-image: url('<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/" . $data['image']; ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1><?php echo $data['title']; ?></h1>
                    <h2 class="subheading"><?php echo $data['sub_title']; ?></h2>
                    <span class="meta">Posted by <a href="#"><?php echo $author_name; ?></a> on <?php echo date('F j Y', strtotime($data['publish_date']));?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 res_img">
                <?php echo $data['text']; ?>
            </div>
        </div>
    </div>
</article>


<hr>
<?php include("footer.php"); ?>
