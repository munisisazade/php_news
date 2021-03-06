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

        $aditionalnews = "ALTER TABLE  `article` ADD `slug` VARCHAR (255) DEFAULT NULL";

        $flatpagemodel = "CREATE TABLE `flatpage` (
          `id` INT(11) unsigned NOT NULL auto_increment,
          `url` VARCHAR (255) DEFAULT NULL,
          `title` VARCHAR (255) DEFAULT NULL,
          `content` TEXT DEFAULT NULL,
          `sites` VARCHAR (255) DEFAULT NULL,
           PRIMARY KEY (`id`))";

        $aditionalflat = "ALTER TABLE  `flatpage` ADD `sub_title` VARCHAR (255) DEFAULT NULL ";

        $aditionalflat_two = "ALTER TABLE  `flatpage` ADD `image` VARCHAR (255) DEFAULT NULL ";

        $aditionalflat_three = "ALTER TABLE  `flatpage` ADD `name` VARCHAR (255) DEFAULT NULL ";

        $translatemodel = "CREATE TABLE `translate` (
          `id` INT(11) unsigned NOT NULL auto_increment,
          `header_id` INT(11) unsigned DEFAULT NULL,
           INDEX header (`header_id`),
          `article_id` INT(11) unsigned DEFAULT NULL,
           INDEX article (`article_id`),
          `about_id` INT(11) unsigned DEFAULT NULL,
           INDEX about (`about_id`),
          `flatpage_id` INT(11) unsigned DEFAULT NULL,
           INDEX flatpage (`flatpage_id`),
          `name` VARCHAR (255) DEFAULT NULL,
          `title` VARCHAR (255) DEFAULT NULL,
          `sub_title` VARCHAR (255) DEFAULT NULL,
          `text` TEXT DEFAULT NULL,
          `lang` VARCHAR (4) DEFAULT 'az',
           FOREIGN KEY (`header_id`) REFERENCES header(`id`) ON DELETE CASCADE,
           FOREIGN KEY (`article_id`) REFERENCES article(`id`) ON DELETE CASCADE,
           FOREIGN KEY (`about_id`) REFERENCES about(`id`) ON DELETE CASCADE,
           FOREIGN KEY (`flatpage_id`) REFERENCES flatpage(`id`) ON DELETE CASCADE,
           PRIMARY KEY (`id`))";

//        if ($mysqli->query($translatemodel) === TRUE) {
//            echo "Successfuly Created translation model";
//        }
//        else {
//            echo "ERROR $mysqli->error";
//        }
//        if ($mysqli->query($aditionalflat_two) === TRUE) {
//            echo "Successfuly update flatpage2 table";
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
//        function change_language($lang) {
//            if ($_SERVER['REQUEST_URI'] != "/") {
//                echo str_replace("/".$_SESSION['lang']."/","/".$lang."/",$_SERVER['REQUEST_URI']);
//            }
//            else {
//                echo "/".$lang."/";
//            }
//        }
?>
