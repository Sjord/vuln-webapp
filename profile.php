<?php
    require("config.php");
    session_start();
    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABSE);
?>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <?php
        $result = mysqli_query($db, "SELECT * FROM user");
        $deets = mysqli_fetch_array($result);
        include("includes/nav.php");
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $userName = $_POST["userName"];
            $privilege_level = $_POST["privilege_level"];
            if($db->connect_errno)
            {
                echo "Failed to connect to MySQL: (" . $mysqli->db. ") " . $mysqli->db;
            }
            else
            {
                $db->query("INSERT into 'user' (firstname, lastname, email, password, username, privilege_level) VALUES ('$firstName', '$lastName', '$email', '$password', '$userName', '$privilege_level') ");
            }

        }

        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) //check for username, may have to change it
        {
        ?>

        <body>
            <h1 class="title is-one">Profile Settings</h1>
            <br>
            <h4 class="title is-four">Change Settings </h4>
            <div class="box">
                <form method="POST" action="profile.php">
                    <div class="control is-horizontal">
                        <div class="control is-grouped">
                            <p class="control is-expanded">
                                <input class="input" type="text" value="<?=$deets['firstname'];?>" name="firstName" placeholder="First Name">
                            </p>
                            <p class="control is-expanded">
                                <input class="input" type="text" value="<?=$deets['lastname'];?>"name="lastName" placeholder="Last Name">
                            </p>
                        </div>
                    </div>

                    <div class="control">
                            <p class="control">
                                <input class="input" type="email" value="<?=$deets['email'];?>" placeholder="Email" name="email">
                            </p>
                    </div>

                    <div class="control is-horizontal">
                        <div class="control is-grouped">
                            <p class="control is-expanded">
                                <input class="input" type="password" placeholder="Password" name="password">
                            </p>
                            <p class="control is-expanded">
                                <input class="input" type="password" placeholder="Enter Password">
                            </p>
                        </div>
                    </div>

                    <p class="control">
                        <input class="input"  name="userName" value="<?=$deets['username'];?>" placeholder="username">
                    </p>

                    <p class="control">
                        <input class="input" type="hidden"  name="privilege_level"  placeholder="privilege level">
                    </p>

                    <p class = "control">
                        <button class="button is-success" type="submit">
                            Submit
                        </button>
                    </p>  
        }


