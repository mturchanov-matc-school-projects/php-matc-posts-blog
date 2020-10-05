<?php


class RemovePost
{
    public function deletePost(){
        // Make sure the user is logged in before going any further.
        if (!isset($_SESSION['user_id']))
        {
            echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
            exit();
        }
        else
        {
            // Retrieve the score data from MySQL
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $user_id = $_SESSION['user_id'];
            $query = "SELECT id,picture FROM posts ORDER BY id DESC";
            $data = mysqli_query($dbc, $query);

            // Loop through the array of score data, formatting it as HTML
            echo '<table>';
            echo '<tr><th></th><th></th></tr>';

            while ($row = mysqli_fetch_array($data))
            {
                // Display the posts that can be deleted
                echo '<tr><td><img class="admin_pics" src="' . MM_UPLOADPATH . $row['picture']
                    . '" alt="' . $row['title'] . '" /></td>';

                echo '<td><a  href="removelog.php?id=' . $row['id'] . '&amp;picture=' . $row['picture']
                    .'">' . '<img id="del" src="images/tr.png">' . '</a>';

                echo '</td></tr>';
            }
            echo '</table>';

            mysqli_close($dbc);
        }
    }

}