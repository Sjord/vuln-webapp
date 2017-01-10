<?php
    session_start();
    if (!isset($_SESSION['username']))
    {
        header("Location: login.php");
    }
?>
<!doctype html>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <body>
        <?php include("includes/nav.php") ?>

        <!-- content here my dude -->
    </body>
</html>
