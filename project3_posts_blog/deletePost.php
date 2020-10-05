<?php
require_once ('tool_shortcuts/start_session.php');
//for flexible templates
require_once ('tool_shortcuts/header.php'); ?>
<link rel="stylesheet" href="styleSheets/deletePost.css">
<title>Adminer - Delete Post</title><?php
require_once ('tool_shortcuts/nav_sector.php');
require_once ('tool_shortcuts/appvars.php');
require_once ('tool_shortcuts/connectvars.php');
require_once ('tool_shortcuts/RemovePost.php');
?>
<h2>ADMINER - REMOVE POST</h2>
<?php
// Make sure the user is logged in before going any further.
$delete_post = new RemovePost();
$delete_post->deletePost();
require_once ('tool_shortcuts/footer.php');
?>
