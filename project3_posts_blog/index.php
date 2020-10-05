<?php
require_once ('tool_shortcuts/start_session.php');
require_once ('tool_shortcuts/header.php'); ?>
<link rel="stylesheet" href="styleSheets/index.css">
<title>Home</title>
<?php
require_once ('tool_shortcuts/nav_sector.php');
require_once ('tool_shortcuts/connectvars.php');
require_once ('tool_shortcuts/appvars.php');
?>

<h2>My posts:</h2>

<?php
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Retrieve the post data from MySQL
$query = "SELECT title,date, description, picture FROM posts WHERE picture IS NOT NULL ORDER BY id DESC";

$data = mysqli_query($dbc, $query);

// Loop through the array of user data, and provide the fresh posts
$counter = 0;
while ($row = mysqli_fetch_array($data))
{
    ?>
    <div class="row text-center">
        <div class="col-md-3"></div>
        <div id="photo-wrapper" class="col-md-6">

            <?php
            //display posts
            if (is_file(MM_UPLOADPATH . $row['picture']) && filesize(MM_UPLOADPATH . $row['picture']) > 0)
            {
                $target = MM_UPLOADPATH . $row['picture'];
                echo '<a href=' . $target . '><img id="myImg" class="postPic" src="' . $target . '" alt="' . $row['title'] . '" /></a>';
                echo '<h3>' . $row['title'] . '</h3>';
                $counter++;
            }
            else
            {
                echo '<img class="postPic" src="' . MM_UPLOADPATH . 'nopic.png' . '" alt="' . $row['title'] . '" /></td>';
                echo '<h3>' . $row['title'] . '</h3>';
                $counter++;
            }
            ?>
            <p><?php echo $row['description']; ?></p>
            <div class="text-right" id="date">
                <small><?php echo $row['date']; ?></small>
            </div>
        </div>

        <div class="col-md-3"></div>
    </div>
    </div>
    <br>
    <br>

    <?php
}
mysqli_close($dbc);

//if there is 0 posts then display 'nopic'
if ($counter == 0)
{
    ?>
    <div id="noContent">
        <img src="images/nopic.PNG" alt="no_posts">
    </div>
    <?php
}
?>

<?php
require_once ('tool_shortcuts/footer.php');
?>

</div>
</div>

</html>
