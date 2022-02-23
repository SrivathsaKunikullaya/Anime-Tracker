<?php
session_start();
include "db.php";?>
<html>

<head>
    <link rel="stylesheet" href="anime_viewing.css">
    <style>
    body {
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(../images/13.jpg);
        background-size: cover;
        background-position: center;
    }

    .hi {
        text-align: center;
        font-family: sans-serif;
        width: 100%;
        font-weight: bold;
        font-size: 50px;
        color: white;
    }

    .back {
        position: relative;
        /* margin-left:48%; */
        margin: 10px 730px;
    }
    </style>
</head>

<body>
    <div class="hi">WATCHING</div>

    <?php
$uname = $_SESSION['uname'];

$data = mysqli_query($conn, "SELECT * FROM user where `name`='$uname'");
$arr = mysqli_fetch_array($data);
$id = $arr['id'];
$sql = "SELECT * from anime1 where user_id='$id' and status='WATCHING'";
$result = mysqli_query($conn, $sql);
echo "<table><thead><tr><th>Anime</th><th>Episode</th><th>Edit</th><th>Delete</th></tr></thead>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . $row['anime'] . "</td>
    <td>" . $row['episode'] . "</td>
    <td><button type='button'><span></span><a href=\"http://localhost/anime/code/edit_anime.php?editid=" . $row['id'] . "\">Edit</a></button></td>
    <td><button type='button'><span></span><a href=\"http://localhost/anime/code/delete_anime_watching.php?did=" . $row['id'] . "\">Delete</a></button></td></tr>
";
}

?>
    <div class="back">
        <button type="button"><span></span><a href="anime_page.html">BACK</a></button>
    </div>

</body>

</html>