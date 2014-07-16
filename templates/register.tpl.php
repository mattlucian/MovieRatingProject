<html>
    <head>
        <title><?php print @$this->title; ?></title>
    </head>
    <body>
        <h1><?php print @$this->initialHeader; ?></h1>
        <form action="register.php" method="post">
            Username:<br />
            <input type="text" name="username" value="" />
            <br /><br />
            E-Mail:<br />
            <input type="text" name="email" value="" />
            <br /><br />
            Password:<br />
            <input type="password" name="password" value="" />
            <br /><br />
            <input type="submit" value="Register" />
        </form>
        <a href="login.php">Click here to Login</a>
        <p style="color:red;"><?php print @$this->error ?></p>
        <p style="color:blue;"><?php print @$this->success ?></p>
    </body>
</html>
