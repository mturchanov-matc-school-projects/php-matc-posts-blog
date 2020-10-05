<?php
require_once('tool_shortcuts/start_session.php');
//for flexible templates

require_once('tool_shortcuts/header.php');?>
<link rel="stylesheet" href="styleSheets/createPost.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>


<title>Adminer - Add Post</title><?php
require_once('tool_shortcuts/nav_sector.php');
require_once('tool_shortcuts/appvars.php');
require_once('tool_shortcuts/connectvars.php');
require_once ('tool_shortcuts/AddPost.php');
require_once ('tool_shortcuts/InitWys.php');

// Make sure the user is logged in before going any further.
?>
<h2>ADD your post</h2>
<?php
$newPost = new AddPost();
$newPost -> generatePost();


?>
<form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />

    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">title:</label>
        <div class="col-sm-4">
            <input type="text" name="title" class="form-control inputstl" id="name1" placeholder="Enter Your title"
                   value="<?php if (!empty($title)) echo $title; ?>" />
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">description:</label>
        <div class="col-sm-5">
            <textarea id="summernote" name="description" class="form-control description" rows="10"
                      value="<?php if (!empty($description)) echo $description; ?>" /></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="pic" class="col-sm-2 control-label">Picture:</label>
        <div class="file-field">
            <div class="col-sm-5">
                <input type="file" id="new_picture" name="new_picture" >
            </div>
        </div>
        <br>
        <input id="sub" type="submit" value="ADD POST" name="submit" />
</form>
<?php $editor = new InitWys; $editor-> editorEd() ?>

<?php
require_once ('tool_shortcuts/footer.php');
?>

</body>
</html>
