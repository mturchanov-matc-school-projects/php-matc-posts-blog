</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="jumbotron text-center">
    <h1>Photo Blog</h1>
    <a href="index.php"><p>Reveal the world with me</p></a>
</div>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['username']))
                { ?>
                    <li><a href="deletePost.php">Delete Post</a>&nbsp;</li>
                    <li><a href="createPost.php">Add Post</a>&nbsp;</li>
                    <li><a href="logout.php">Log Out</a></li>
                    <?php
                }
                else
                { ?>
                    <li><a href="login.php">ADMINER</a></li>
                    <?php
                } ?>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
        </div>
    </div>
</nav>
<body>
<div id="main" class="container-fluid text-center bg-grey">
