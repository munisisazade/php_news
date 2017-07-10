<?php
    $mysqli = new mysqli("localhost","php_user","RkZmUpHmZwAekaLn","php_news_usta");
    $mysqli->set_charset("utf8");
    //session_start();
    //if(!isset($_SESSION['name'])){
    //    header("Location: index.php");
    //}
   // else {
        $password = md5(check_input("demo12345"));
        $query = "INSERT INTO `users` (`name`, `surname`, `username`, `password`, `email`) VALUES ('Munis','Isazade','munis', '" . $password . "','munisisazade@gmail.com')";
        if ($mysqli->query($query) === TRUE) {
            echo "Successfuly created";
        } else {
            echo $mysqli->error;
        }
        function check_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    //}

?>
