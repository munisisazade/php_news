<?php include("header.php"); ?>
<?php include("menu.php");
    if($_GET['base_url']) {

        global $mysqli;
        $base_url = check_input($_GET['base_url']);
        if ($_SESSION['lang'] != 'en') {
            $flat_query = "SELECT * FROM `flatpage` JOIN `translate` ON `translate`.flatpage_id=`flatpage`.id WHERE `url` LIKE '%" . $base_url . "%'";

            $result = $mysqli->query($flat_query);
            function get_data()
            {
                global $result;
                foreach ($result as $key) {
                    return $key;
                }
            };
        }
        else {
            $flat_query = "SELECT * FROM `flatpage` WHERE `url` LIKE '%" . $base_url . "%'";

            $result = $mysqli->query($flat_query);
            function get_data()
            {
                global $result;
                foreach ($result as $key) {
                    return $key;
                }
            };
        }
        $data = get_data();
    }
    function check_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<header class="intro-header" style="background-image: url('<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/" . $data['image']; ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1><?php echo $data['title']; ?></h1>
                    <hr class="small">
                    <span class="subheading"><?php echo $data['sub_title']; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php echo $data['content'];?>
        </div>
    </div>
</div>

<hr>
<?php include("footer.php"); ?>
