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

<?php
    include("/includes/nav.php");
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])
    {
        $tracking_id = $_GET["id"];
        
        $result = $db->query("SELECT * FROM shipment WHERE id = '$tracking_id'");
        $row = $db->fetch_array(MYSQLI_ASSOC);
        $active = $row["active"];


        // if the id has matched then we have found the item
        // else that doesn't exist
        if($result->num_rows > 0) 
        {
            // Here we want to set some vars to display 
            $shipment_found = true;
        }
        else 
        {
            $shipment_found = false;
            header("Location: tracking.php?not_found");
        }
    }
    else 
    {
        $shipment_found = false;
        header("Location: tracking.php?invalid");
    }
?>

<?php 
        if($shipment_found == true) 
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
        elseif(isset($_GET["not_found"])
        {
?>
        <div class="notification is-danger">
        
        </div>
<?php 
        }
        elseif(isset($_GET["invalid"]))
        {
?>
<?php 
        } 
?>

    </body>
</html>
