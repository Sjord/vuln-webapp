<!doctype html>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <?php
    //include("/includes/nav.php");
    //include("config.php");
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $pwrod = $_POST["password"];

        //define $query depending on tables and databases matt adds

        if(mysqli_query($db, $query))
        {
            echo "Records added successfully";
        }

        else
        {
            echo "ERROR: Could not be able to execute $sql" . mysqli_error($db);
        }
    }
    ?>

    <body>
        <h1 class="title is-one"> Planet Express </h1>
        <h3 class="title is-three"> Sign Up Here </h1>
        <form method="POST">
            <div class="control is-horizontal">
                <div class="control is-grouped">
                    <p class="control is-expanded">
                        <input class="input" type="text" name="firstName" placeholder="First Name">
                    </p>
                    <p class="control is-expanded">
                        <input class="input" type="email" placeholder="Last Name">
                    </p>
                </div>
            </div>

            <div class="control">
                    <p class="control">
                        <input class="input" type="email" placeholder"Email" name="email">
                    </p>
            </div>

            <div class="control is-horizontal">
                <div class="control is-grouped">
                    <p class="control is-expanded">
                        <input class="input" type"password" placeholder="Password" name="password">
                    </p>
                    <p class="control is-expanded">
                        <input class="input" type"password" placeholder="Enter Password">
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



