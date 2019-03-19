<?php
require_once "settings.php";

if (!$_GET['id']) {
    header('Location: topics.php');
    return;
}

$sql = "SELECT * from forum_posts where post_id=" . $_GET['id'];
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
} else {
    header('Location: topics.php');
    return;
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-11 col-sm-12">
            <h1 class="mt-3">Title: <?php echo $row['post_title']; ?></h1>
            <h6 class="text-muted">
                Owner: <b><?php echo $row['post_owner']; ?></b><br>Created date: <b><?php echo $row['post_create_time']; ?></h6>
            </h6>
            <hr>
            <p>
                <?php echo $row['post_text']; ?>
            </p>
            <b><a href="Home.html" class="">Go Back to the Home Page</a></b><br>
            <b><a href="topics.php" class="">Go Back to the Discussion Forum Page</a></b>
        </div>
    </div>

</div>
</body>
</html>
