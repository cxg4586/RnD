<?php include (“settings.php”);?>

<!doctype html>

<html>

<head>

<meta charset=”utf-8″>

<title>Comment to Post</title>

<link rel=”stylesheet” type=”text/css” href=”styles.css”>

</head>

<body>

<div class=”body”>

Simple Posting Updates With Comment in PHP and MYSQL

</div>

<div class=”body”>

<form method=”post” action=”post-action.php”>

<label>Add Post:</label><br>

<textarea name=”post_msg” required></textarea><br>

<input type=”text” name=”uname” placeholder=”type your name here…” required /><br>

<input type=”submit” name=”post” value=”Post” />

</form>

<?php

if (isset($_GET[‘post_action’])) {

if ($_GET[‘post_action’] == “posted”) {

echo ‘Successfully Posted!’;

}

}

?>

</div>

<?php

$posts = $mysqli->query(“SELECT * FROM posts ORDER BY post_id DESC”);

?>

<div class=”body”>

<b><?php echo $posts->num_rows ?></b> total posts

</div>

<div class=”body” style=”padding-bottom: 1px;”>

<?php

if ($posts->num_rows == null) {

echo ‘no posts yet’;

} else if ($posts->num_rows != null) {

while ($post_data = $posts->fetch_assoc()) { ?>

<div class=”post-panel”>

<div class=”post-header”>

<b><?php echo $post_data[‘post_name’] ?></b>

</div>

<div class=”post-body”>

<?php echo $post_data[‘post_msg’] ?>

</div>

<?php

$comments = $mysqli->query(“SELECT * FROM comments WHERE post_id = “.$post_data[‘post_id’].””);

?>

<div class=”post-footer”>

<a href=”view-post.php?post_id=<?php echo $post_data[‘post_id’] ?>”>Comment (<?php echo $comments->num_rows ?>)</a>

</div>

</div>

<?php }

}

?>

</div>

</body>

</html>