<?php 
    $mysqli = new mysqli("localhost","php_user","RkZmUpHmZwAekaLn","php_news_usta");
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_error) {
        echo $mysqli->error;
    }
    else {
        $headertable = "CREATE TABLE `header` (
          `id` INT(11) unsigned NOT NULL auto_increment,
          `name` VARCHAR (20) DEFAULT NULL,
          `text` VARCHAR (40) DEFAULT NULL,
           PRIMARY KEY (`id`))";

        $usertable = "CREATE TABLE `users` (
          `id` INT(11) unsigned NOT NULL auto_increment,
          `name` VARCHAR (20) DEFAULT NULL,
          `surname` VARCHAR (20) DEFAULT NULL,
          `username` varchar(40) NOT NULL default '',
          `password` varchar(50) NOT NULL default '',
          `email` varchar(225) NOT NULL default '',
           PRIMARY KEY (`id`))";

        $article = "CREATE TABLE `article` (
          `id` INT(11) unsigned NOT NULL auto_increment,
          `title` VARCHAR (255) DEFAULT NULL,
          `image` VARCHAR (255) DEFAULT NULL,
          `sub_title` VARCHAR (255) DEFAULT NULL,
          `author_id` INT(11) unsigned NOT NULL,
           INDEX author (`author_id`),
          `publish_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          `text` TEXT DEFAULT NULL,
           FOREIGN KEY (`author_id`) REFERENCES users(`id`) ON DELETE CASCADE,
           PRIMARY KEY (`id`))";

        $about_us = "CREATE TABLE `about` (
          `id` INT(11) unsigned NOT NULL auto_increment,
          `title` VARCHAR (255) DEFAULT NULL,
          `image` VARCHAR (255) DEFAULT NULL,
          `sub_title` VARCHAR (255) DEFAULT NULL,
          `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          `text` TEXT DEFAULT NULL,
          `tw_link` VARCHAR (255) DEFAULT NULL,
          `fb_link` VARCHAR (255) DEFAULT NULL,
          `git_link` VARCHAR (255) DEFAULT NULL,
           PRIMARY KEY (`id`))";

        $message = "CREATE TABLE `message` (
          `id` INT(11) unsigned NOT NULL auto_increment,
          `name` VARCHAR (255) DEFAULT NULL,
          `email` VARCHAR (255) DEFAULT NULL,
          `phone` VARCHAR (255) DEFAULT NULL,
          `message` TEXT DEFAULT NULL,
           PRIMARY KEY (`id`))";


//        if ($mysqli->query($message) === TRUE) {
//            echo "Successfuly create article table";
//        }
//        else {
//            echo "ERROR $mysqli->error";
//        }
//
//
//        if ($mysqli->query($headertable) === TRUE) {
//            echo "Successfuly create users table";
//        }
//        else {
//            echo "Error ocured $mysqli->error";
 //       }

    }
?>
