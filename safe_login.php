<?php
    require("config.php");
    $redirect_to = "dashboard.php";
    session_start();
    if (isset($_SESSION['email']))
    {
        header("Location: " . $redirect_to);
    }

    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password']))
    {
        $myemail = $_POST["email"];
        $mypassword = $_POST["password"];


        // Use prepared statement to prevent SQL injection
        $statement = $db->prepare("SELECT email FROM user WHERE email = ? AND password = ?");
        $statement->bind_param("ss", $myemail, $mypassword);
        $statement->bind_result($email_out);
        $statement->execute();
        $has_result = $statement->fetch();

        // Check that there's actually a result
        if ($has_result)
        {
            $_SESSION["email"] = $email_out;
            header("Location: " . $redirect_to);
        }
        else
        {
            header("Location: safe_login.php?invalid");
        }
    }
?>
<!doctype html>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <body>
        <?php require("includes/nav.php"); ?>
        <h1 class="title is-one"> Planet Express </h1>
        <div class="box">
            <?php
                if ( isset($_GET['invalid'] ))
                {
                     echo "The email or password you entered is invalid.";
                }
                else if (isset($_GET['created']))
                {
                    echo "Account created successfully, so please now sign in below.";
                }
            ?>
            <form method="POST">
                <p class="control has-icon">
                    <input class="input is-primary" name="email" type="text" placeholder="Email address">
                    <span class="icon is-small">
                        <i class="fa fa-envelope"></i>
                    </span>
                </p>
                <p class="control has-icon">
                    <input class="input is-danger" name="password" type="password" placeholder="Password">
                    <span class="icon is-small">
                        <i class="fa fa-lock"></i>
                    </span>
                </p>
                <p class="control">
                    <button class="button is-success" type="submit">
                        Login
                    </button>
                </p>
                <br>
                <br>
                <p class = "control">
                    <button class="button is-success">
                        Forgot Email
                    </button>
                </p>
                <p class = "control">
                    <button class="button is-success">
                        Forgot Password
                    </button>
                </p>
            </form>
        </div>
    </body>
