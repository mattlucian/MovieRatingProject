<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel='shortcut icon' href='http://cop4813.ccec.unf.edu/~n00617897/favicon.ico' />
        <link rel="stylesheet" type="text/css" href="../inc/style.css" />
        <link rel="stylesheet" type="text/css" href="../inc/grid.css">
        <link rel="stylesheet" type="text/css" href="../inc/bootstrap.css">
	    <script src="../inc/jquery.js"></script>
	    <script src="../inc/functions.js"></script>
        <title><?php print @$this->title; ?></title>
    </head>
    <body>
        <h1><?php print @$this->head;?> </h1>
        <form action="login.php" method="post">
            Username:<br />
            <input type="text" name="username" value="" />
            <br /><br />
            Password:<br />
            <input type="password" name="password" value="" />
            <br /><br />
            <input class="bigButton" type="submit" value="Login" />
        </form>
        <p style="color:red;"><?php print @$this->error ?></p>
        <a href="register.php">Register</a>

        <div id="movieContianer">
	
	</div>
   </body>
</html>
