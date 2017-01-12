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
        $mylastname = $user["lastname"];
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

    // Admin dashboard 
    //
    //
    if($myprivilege == 2) 
    {
?>
        <section class="hero is-success is-bold">
		</div>
<?php 
    } 
    // User dashboard 
    //
    //
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
<?php 
	if($myprivilege == 2) 
	{
?>
	<section class="section">
		<div class="columns">
			<div class="column">
				<div class="card">
				  <div class="card-image">
					<figure class="image is-4by3">
					  <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
					</figure>
				  </div>
				  <div class="card-content">
					<div class="media">
					  <div class="media-content">
						<p class="title is-4"><?=$myfirstname; ?> <?=$mylastname; ?></p>
						<p class="subtitle is-6">
						</p>
					  </div>
					</div>

					<div class="content">
						<span class="icon is-small">
							<i class="fa fa-envelope"></i>
						</span>
						<a href="mailto:<?=$myemail; ?>"><?=$myemail; ?></a>
						<br>
						<span class="icon is-small">
							<i class="fa fa-unlock-alt"></i>
						</span>
						<strong>Admin</strong>
						<br>
						<span class="icon is-small">
							<i class="fa fa-key"></i>
						</span>
						<a href="profile.php">Change Details</a>
						<br>

					</div>
				  </div>
				</div> 
			</div>
			<div class="column">
			Second column
			</div>
			<div class="column">
			Third column
			</div>
			<div class="column">
			Fourth column
			</div>
		</div>
	</section>
<?php 
	}
	else
	{
?>
	<section class="section">
		<div class="columns">
		  <div class="column is-one-thirds">
				<div class="card">
				  <div class="card-image">
					<figure class="image is-4by3">
					  <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
					</figure>
				  </div>
				  <div class="card-content">
					<div class="media">
					  <div class="media-content">
						<p class="title is-4"><?=$myfirstname; ?> <?=$mylastname; ?></p>
						<p class="subtitle is-6">
						</p>
					  </div>
					</div>

					<div class="content">
						<span class="icon is-small">
							<i class="fa fa-envelope"></i>
						</span>
						<span><a href="mailto:<?=$myemail; ?>"><?=$myemail; ?></a></span>
						<br>
						<span class="icon is-small">
							<i class="fa fa-unlock-alt"></i>
						</span>
						<span><strong>User</strong></span>
						<br>
						<br>

					</div>
				  </div>
				</div> 
				<br>
				<div class="block">
					<a class="button is-success">
						<span class="icon is-small">
							<i class="fa fa-rocket"></i>
						</span>
						<span>Request Shipment</span>
					</a>
					<a class="button is-warning" href="profile.php">
						<span class="icon is-small">
							<i class="fa fa-key"></i>
						</span>
						<span>Change Details</span>
					</a>
				</div>
		  </div>
		  <div class="column is-two-thirds">
			<h1 class="title">Your Shipments</h1>
			<table class="table">
				<thead>
					<tr>
						<th><abbr title="Shipment ID">ID</abbr></th>
						<th><abbr title="Shipment Name">Name</abbr></th>
						<th></th>	
					</tr>
				</thead>
				<tbody>
<?php
        $shipment_result = $db->query("SELECT * FROM shipment WHERE customer_id = '$myid'");
		while ($shipment = $shipment_result->fetch_array(MYSQLI_ASSOC)) 
		{
?>
				<tr>
					<th><?=$shipment["id"]; ?></th>
					<td><?=$shipment["name"]; ?></td>	
					<td><a href="tracking.php?id=<?=$shipment["id"]; ?>">Track</a></td>
				</tr>
<?php
		}
?>
			</tbody>
			</table>
		  </div>
		</div>
</section>
<?php 
	}
?>
    </body>
</html>
