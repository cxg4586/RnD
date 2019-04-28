<?php
require_once "settings.php";
session_start();
$username = $_SESSION['username'] ?? false;
$isadmin = $_SESSION['isadmin'] ?? false;
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

$sql = "SELECT * from forum_posts";
$result = $con->query($sql);

?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h1>
                Discussion forum
                <?php
                // only show add post if is logged in
                if ($username) {
                    echo '<a href="addtopic.html" class="btn btn-success">Add Post</a>';
                }
                ?>

            </h1>
            <?php
            if (!$username) {
                echo '<i><b><a href="login.php">Login</a></b> to add new post</i><br><br> ';
            }
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Owner</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "  <tr>
                                    <td><a href='topic.php?id={$row['post_id']}'>{$row['post_title']}</a></td>
                                    <td>{$row['post_owner']}</td>
                                    <td>{$row['post_create_time']}</td>
                                    " . ($isadmin ? "<td><a class='btn btn-danger' href='deletetopic.php?id={$row['post_id']}'>Delete</a></td>" : '') . "
                                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No posts found</td></tr>";
                }
                ?>
                </tbody>
            </table>
            <b><a href="Home.php" class="">Go Back to the Home Page</a></b>
        </div>
    </div>

</div>

</body>
</html>
