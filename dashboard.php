<?php 
    require("config.php");
    session_start();
    if (!isset($_SESSION["email"]))
    {
        header("Location: login.php?not_logged_in");
    }

    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    
    if(isset($_SESSION["email"])) 
    {
        $myemail = $_SESSION["email"];

        $result = $db->query("SELECT * FROM user WHERE email = '$myemail'");

        $user = $result->fetch_array(MYSQLI_ASSOC);

        $myid = $user["id"];
        $myfirstname = $user["firstname"];
        $mysecondname = $user["secondname"];
        $myprivilege = $user["privilege_level"];
    }
?>
<!doctype html>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>
    <body>
<?php 
    include("includes/nav.php"); 
    if($myprivilege == 2) 
    {
?>
        <section class="hero is-success is-bold">
<?php 
    } 
    elseif ($myprivilege == 1) 
    {
?>
        <section class="hero is-info is-bold">
<?php 
    } 
    else 
    {
        unset($_SESSION["email"]);
        header("Location: login.php?not_logged_in");
    }
?>
            <div class="hero-body">
                <div class="container">
                    <h1 class="title is-1">
                        Your Dashboard
                    </h1>
                    <h2 class="subtitle is-3">
                    Welcome to your dashboard, <?=$myfirstname; ?>.
                    </h2>
                </div>
            </div>
        </section>
    </body>
</html>
