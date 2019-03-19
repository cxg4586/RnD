<?php

require_once "settings.php";
//check for required fields from the form
if ((!$_POST['topic_owner']) || (!$_POST['topic_title'])
    || (!$_POST['post_text'])) {
    header("Location: addtopic.html");
    exit;
}

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
$text = mysqli_real_escape_string($con, $_POST['post_text']);
$add_post = "insert into forum_posts(post_title, post_text, post_create_time, post_owner) values ('".$_POST['topic_title']."',
'$text', now(), '$_POST[topic_owner]')";
mysqli_query($con, $add_post) or die(mysqli_error($con));

header('Location: topic.php?id='.$con->insert_id);

//create nice message for user
$msg = "<P>The <strong>$_POST[topic_title]</strong> topic has been created.</p>";
?>
<html>
<head>
    <title>New Topic Added</title>
</head>
<body>
<h1>New Topic Added</h1>
<?php print $msg; ?>
</body>
</html>
