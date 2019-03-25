<?php

include (“settings.php”);

if (isset($_POST[‘post’])) {

$post_msg = $_POST[‘post_msg’];

$uname = $_POST[‘uname’];

$queryCre = CREATE TABLE posts (post_id int(11) NOT NULL, post_name text NOT NULL, post_msg text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

$res = mysqli_query($conn, $queryCre);

$post = $mysqli->query(“INSERT INTO posts (post_name, post_msg) VALUES (‘$uname’, ‘$post_msg’)”);

if ($post) {

header(“Location: index.php?post_action=posted”);

} else {

echo $mysqli->error;

}

}

?>