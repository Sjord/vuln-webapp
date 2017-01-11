<?php
    session_start();
?>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <?php
        include("includes/nav.php");
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
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
                                <input class="input" type="text" name="firstName" placeholder="First Name">
                            </p>
                            <p class="control is-expanded">
                                <input class="input" type="text" name="lastName" placeholder="Last Name">
                            </p>
                        </div>
                    </div>

                    <div class="control">
                            <p class="control">
                                <input class="input" type="email" placeholder="Email" name="email">
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
                        <input class="input" type="hidden" placeholder="username">
                    </p>

                    <p class = "control">
                        <button class="button is-success" type="submit">
                            Submit
                        </button>
                    </p>  



        }


