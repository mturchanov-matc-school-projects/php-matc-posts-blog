<?php
require_once ('appvars.php');
require_once ('connectvars.php');
class AddPost
{
    public function generatePost()
    {
        if (!isset($_SESSION['user_id']))
        {
            echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
            exit();
        }
        else
        {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            if (isset($_POST['submit']))
            {

                // Grab the profile data from the POST
                $title = mysqli_real_escape_string($dbc, trim($_POST['title']));
                $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
                $new_picture = mysqli_real_escape_string($dbc, trim($_FILES['new_picture']['name']));
                $new_picture_type = $_FILES['new_picture']['type'];
                $new_picture_size = $_FILES['new_picture']['size'];
                @list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']);

                //CHANGE
                // Validate and move the uploaded picture file, if necessary
                if (!empty($new_picture))
                {
                    if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') || ($new_picture_type == 'image/pjpeg') || ($new_picture_type == 'image/png')) && ($new_picture_size > 0) && ($new_picture_size <= MM_MAXFILESIZE) && ($new_picture_width <= MM_MAXIMGWIDTH) && ($new_picture_height <= MM_MAXIMGHEIGHT))
                    {
                        $target = MM_UPLOADPATH . basename($new_picture);
                        move_uploaded_file($_FILES['new_picture']['tmp_name'], $target);

                        $query = "INSERT INTO posts(title, description, picture) VALUES ('$title','$description','$new_picture')";
                        mysqli_query($dbc, $query) or die("err que");

                        // Confirm success with the user
                        echo '<p>Your post has been successfully added. Would you like ' . 'to <a href="index.php">return to the homepage</a>?</p>';
                        mysqli_close($dbc);

                    }
                    else
                    {

                        //CHANGE
                        // The new picture file is not valid, so delete the temporary file and set the error flag
                        echo '<p class="error">Your picture must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024) . ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</p>';
                    }
                }
                else
                {//CHANGE
                    echo 'You must upload a picture';
                }
            }
        }
    }

}

