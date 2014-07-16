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
<h1><?php print @$this->head ?></h1>
<b>Welcome back <?php print @$this->name ?>!</b><br/><br/>
<a href="edit_account.php">Edit Account</a><br />
<a href="movies.php">Movie Listing</a><br/>

<a href="login.php?exit=1">Logout</a><br />
<!--  -->

<p style="color:red"><?php print @$this->error ?></p>
</body>
</html>
