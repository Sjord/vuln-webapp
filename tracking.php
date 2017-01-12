<?php 
    require("config.php");
    session_start();

    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && !isset($_GET["not_found"]))
    {
        $tracking_id = $_GET["id"];
        
        $result = $db->query("SELECT * FROM shipment WHERE id = '$tracking_id'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $active = $row["active"];


        // if the id has matched then we have found the item
        // else that doesn't exist
        if($result->num_rows > 0) 
        {
            // Here we want to set some vars to display 
        }
        else 
        {
            header("Location: tracking.php?id=$tracking_id&not_found");
        }
    }
    elseif($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]))
    {
        $tracking_id = $_GET["id"];
    }
    elseif($_SERVER["REQUEST_METHOD"] == "GET" && !isset($_GET["id"]) && !isset($_GET["invalid"])) 
    {
        header("Location: tracking.php?invalid");
    }
?>

<?php 
        if(isset($_GET["id"]) && !isset($_GET["not_found"])) 
        {
?> 
       
        <div class="columns">
            <!-- we want to display general data about the shipment here -->
            <div class="column is-two-thirds">

            </div>

            <!-- we want to display the packages in the shipment here -->
            <div class="column">

            </div>
        </div>
<?php 
        }
        elseif(isset($_GET["id"]) && isset($_GET["not_found"]))
        {
?>
        <div class="notification is-danger has-text-centered">
            Shipment with ID <?=$tracking_id; ?> not found!       
        </div>
<?php 
        }
        elseif(isset($_GET["invalid"]))
        {
        http_response_code(404);
?>
        <div class="container has-text-centered">
        <h1 class="title is-1"><?=http_response_code(); ?></h1>
        <h2 class="subtitle is-3">Oops, it seems something went wrong!</h2>
        </div>
<?php 
        } 
?>

    </body>
</html>
