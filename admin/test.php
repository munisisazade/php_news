<?php


if ($_POST['cool']) {
    echo $_POST['text'];
    $text = $_POST['text'];
    $create_post = "INSERT INTO `article` (`text`) VALUES ('" . $text . "')";
    var_dump($create_post);
}

?>
<html>
<head>
    <script src="../js/min/assets/jquery.min.js" ></script>
    <script src="../js/ckeditor/ckeditor/ckeditor.js"></script>
    <script src="../js/ckeditor/ckeditor-init.js"></script>

</head>
<body>
<form method="post" enctype="multipart/form-data">
    <textarea name="text" id="ckeditor" cols="30" rows="10"></textarea>
    <input type="submit" name="cool">

</form>
<script>
    CKEDITOR.replace( "ckeditor");
</script>
</body>
</html>



