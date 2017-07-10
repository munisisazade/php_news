<?php include("header.php"); ?>
<?php include("menu.php");
$get_post = "SELECT * FROM `about`";
$result = $mysqli->query($get_post);
function get_data() {
    global $result;
    foreach ($result as $key) {
        return $key;
    }
};
$data = get_data();

?>
<header class="intro-header" style="background-image: url('<?php echo '/' . $data['image'];?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1><?php echo $data['title'];?></h1>
                    <hr class="small">
                    <span class="subheading"><?php echo $data['sub_title'];?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php echo $data['text'];?>
        </div>
    </div>
</div>

<hr>
<?php include("footer.php"); ?>
