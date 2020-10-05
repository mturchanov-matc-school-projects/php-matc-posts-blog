<?php
require_once ('tool_shortcuts/start_session.php');
//for flexible templates
require_once ('tool_shortcuts/header.php'); ?>
<link rel="stylesheet" href="styleSheets/removelog.css">
<title>Adminer - Delete Post</title>
<?php
require_once ('tool_shortcuts/nav_sector.php');
require_once ('tool_shortcuts/appvars.php');
require_once ('tool_shortcuts/connectvars.php');

if (!isset($_SESSION['user_id']))
{
    echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
    exit();
}
else
{

    if (isset($_GET['id']) && isset($_GET['picture']))
    {
        // Grab the user's id from the GET
        $id = $_GET['id'];
        $picture = $_GET['picture'];
    }
    else if (isset($_POST['id']))
    {
        // Grab the user's id from the POST(this page)
        $id = $_POST['id'];
    }
    else
    {
        echo '<p class="error">Sorry, no high score was specified for removal.</p>';
    }

    //deleting a post
    if (isset($_POST['submit']) && $_POST['confirm'] == 'yes')
    {
        // Delete the post from the server
        @unlink(MM_UPLOADPATH . $picture);

        // Connect to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // Delete the score data from the database
        $query = "DELETE FROM posts WHERE id = $id LIMIT 1";
        mysqli_query($dbc, $query);
        mysqli_close($dbc);

        echo '<p class="text-success">The post was removed.</p>';
        echo '<p><a href="index.php">&lt;&lt; Back to a home page?</a></p>';    }
else if (isset($_POST['submit']) && $_POST['confirm'] == 'no')
{
    echo '<p class="text-error">The post was not removed.</p>';
    echo '<p><a href="index.php">&lt;&lt; Back to a home page</a></p>';
}
    else if (isset($id))
    {
        ?>
        <img id="delPic" src="<?php echo MM_UPLOADPATH . $picture;; ?>" alt="<?php echo $picture; ?>">
        <p>Are you sure you want to delete the following high score?</p>
        <form method="post" action="removelog.php">
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultGroupExample1" value="yes" name="confirm">
                <label class="custom-control-label text-warning" for="defaultGroupExample1">YES</label>
            </div>

            <!-- Group of default radios - option 2 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultGroupExample2" value="no" name="confirm" checked>
                <label class="custom-control-label text-success" for="defaultGroupExample2">NO</label>
            </div>
            </div>

            </div>
            <input type="submit" value="Submit" name="submit" />
            <input type="hidden" name="id" value="<?php echo $id ?>" />

        </form>

        <?php
    }
}

?>

</body>
</html>
