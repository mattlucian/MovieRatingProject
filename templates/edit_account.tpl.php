<html>
    <head>
        <title><?php print @$this->title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel='shortcut icon' href='http://cop4813.ccec.unf.edu/~n00617897/favicon.ico' />
        <link rel="stylesheet" type="text/css" href="../inc/style.css" />
        <link rel="stylesheet" type="text/css" href="../inc/grid.css">
        <link rel="stylesheet" type="text/css" href="../inc/bootstrap.css">
    </head>
    <body>
        <h1>Edit Account</h1>
        <form action="edit_account.php?publish=1" method="post">
            Username:<br />
            <b><?php print @$this->username ?></b><br /><br />
            <input type="hidden" name="username" value="<?php print @$this->username?>"/>
            E-Mail Address:<br />
            <input type="text" name="email" value="<?php print @$this->email ?>" /><br /><br />
            Password:<br />
            <input type="password" name="password" value="" /><br />
            <i>(leave blank if you do not want to change your password)</i><br /><br />
            <input type="submit" value="Update Account" />
        </form>
        <a href="account.php">Return to Account</a>
        <p style="color:red;"><?php print @$this->error ?></p>
        <p style="color:blue"><?php print @$this->success ?></p>
    </body>
</html>