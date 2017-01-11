<!doctype html>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <?php
    //include("/includes/nav.php");
    //include the configuration file with database access
    //also add connection from php to the sql database(which will probs be in the config file)
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $myusername = mysql_real_escape_string($db, $_POST["username"]);
        $mypassword = mysql_real_escape_string($db, $_POST["password"]);

        $sql = "SELECT id FROM admin WHERE username = $myusername AND passcode = $mypassword";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row["active"];
        //if result matched username and password, table row must be 1
        
        if($count == 1)
        {
            session_register("myusername");
            $_SESSION["login_user"] = $myusername;

            header("location : index.php");

        }
        
        else
        {
            $error = "Your login or password is invalid"
        }

        
    }
    ?>
    

    <body>
        <h1 class="title is-one"> Planet Express </h1>
        <div class="box">
            <form method="POST">
                <p class="control has-icon">
                    <input class="input is-primary" name="username" type="text" placeholder="Username">
                    <span class="icon is-small">
                        <i class="fa fa-envelope"></i>
                    </span>
                </p>
                <p class="control has-icon">
                    <input class="input is-danger" name="password" type="password" placeholder="Password">
                    <span class="icon is-small">
                        <i class="fa fa-lock">
                    </span>
                </p>
                <p class = "control">
                    <button class="button is-success" type="submit">
                        Login
                    </button>
                </p> 
                <br>
                <br>
                <p class = "control">
                    <button class="button is-success">
                        Forgot Username
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



