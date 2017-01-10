<!doctype html>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <?php
    //include("/includes/nav.php");
    ?>
    

    <body>
        <h1 class="title is-one"> Planet Express </h1>
        <div class="box">
            <form method="POST">
                <p class="control has-icon">
                    <input class="input is-primary" type="text" placeholder="Username">
                    <span class="icon is-small">
                        <i class="fa fa-envelope"></i>
                    </span>
                </p>
                <p class="control has-icon">
                    <input class="input is-danger" type="password" placeholder="Password">
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



