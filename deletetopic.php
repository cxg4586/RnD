<?php

require_once "settings.php";
session_start();
$username = $_SESSION['username'] ?? false;
$isadmin = $_SESSION['isadmin'] ?? false;
if (!$username || !$isadmin) {
    header("Location: topics.php");
    exit();
}

$id = (int)$_GET['id'];

//create and issue the second query
$createAnotherQueryTable = "CREATE TABLE IF NOT EXISTS `forum_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(191) DEFAULT NULL,
  `post_text` text,
  `post_create_time` datetime DEFAULT NULL,
  `post_owner` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;";

mysqli_query($con, $createAnotherQueryTable);
$delete_post = "delete from forum_posts where post_id=" . $id;
mysqli_query($con, $delete_post) or die(mysqli_error($con));

header('Location: topics.php');

