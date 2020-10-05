<?php
require_once ('tool_shortcuts/start_session.php');
require_once ('tool_shortcuts/header.php'); ?>
<link rel="stylesheet" href="styleSheets/login.css">
<title>Adminer - Log IN</title>
<?php
require_once ('tool_shortcuts/nav_sector.php');
require_once ('tool_shortcuts/appvars.php');
require_once ('tool_shortcuts/connectvars.php');
require_once ('tool_shortcuts/LogInCheck.php');

$check = new LogInCheck();
$check->checkLogIn();

?>
<h2>ADMINER - LOGIN</h2>


<?php
// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_SESSION['user_id']))
{
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" />
        </div>
        <input type="submit" value="Log In" class="btn btn-default" name="submit" />
    </form>
    <?php
}
else
{
    // Confirm the successful log-in

    ?>
    <p class="text-success">Successful login</p>

    <div id="logRedirects" class="container">
        <a href="createPost.php" id="addPost-btn" class="btn btn-info" role="button">ADD POST</a>
        <a href="deletePost.php" id="deletePost-btn" class="btn btn-info" role="button">DELETE POST</a>
    </div>

    <?php
}
require_once ('tool_shortcuts/footer.php');

?>

</body>
</html>
