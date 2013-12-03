<?php
	error_reporting(0);
	require_once(dirname(__FILE__).'/./inc/user.php');
	session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-hashchange.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>
	<title>jTrade</title>
</head>

<body>

<!-- Navigation bar -->

<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="main-navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		    <span class="sr-only">Toggle navigation</span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		   	</button>
			<a href="index.php" class="navbar-brand">jTrader</a>
		</div>
		<div class="navbar-collapse collapse navbar-ex1-collapse">
			<ul class="navbar-nav nav">
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Go!</button>
			</form>
			<ul class="navbar-nav nav navbar-right">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a data-toggle="modal" href="#about-modal">About</a></li>
				<li><a data-toggle="modal" href="#contact-modal">Contact</a></li>
				<?php
					$username = isLoggedIn();
					if (!$username) {
						echo '<li><a href="login.php">Login</a></li>';
					}
					else {
						echo '<li><a href="add_item.php">Add item</a></li>';
						echo '<li><a href="#" id="logout">Logout &nbsp;&nbsp;<em>('.$username.')</em></a></li>';
					}
				?>
			</ul>
		</div>
	</div>
</nav>

<!-- Main -->

<div class="row">
	<div class="col-sm-3 well">
		<div class="container">
			<h4>Categories:</h4>
			<div class="panel-group" id="categories">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5 class="panel-title"><a class="categories-toggle" data-toggle="collapse" data-parent="#categories" href="#categoriesOne">Group 1</a></h5>
					</div>
					<div id="categoriesOne" class="panel-collapse collapse">
						<div class="panel-body">
							Here will be list of subcategories.
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5 class="panel-title"><a class="categories-toggle" data-toggle="collapse" data-parent="#categories" href="#categoriesTwo">Group 2</a></h5>
					</div>
					<div id="categoriesTwo" class="panel-collapse collapse">
						<div class="panel-body">
							Here will be list of subcategories.
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5 class="panel-title"><a class="categories-toggle" data-toggle="collapse" data-parent="#categories" href="#categoriesThree">Group 3</a></h5>
					</div>
					<div id="categoriesThree" class="panel-collapse collapse">
						<div class="panel-body">
							Here will be list of subcategories.
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5 class="panel-title"><a class="categories-toggle" data-toggle="collapse" data-parent="#categories" href="#categoriesFour">Group 4</a></h5>
					</div>
					<div id="categoriesFour" class="panel-collapse collapse">
						<div class="panel-body">
							Here will be list of subcategories.
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5 class="panel-title"><a class="categories-toggle" data-toggle="collapse" data-parent="#categories" href="#categoriesFive">Group 5</a></h5>
					</div>
					<div id="categoriesFive" class="panel-collapse collapse">
						<div class="panel-body">
							Here will be list of subcategories.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-9">
		<div class="container">
			<br/>
			<p class="lead">Search results for query '...' :</p>
		</div>
		<div class="container">
			<div class="row"><div class="container">
				<div class="col-lg-2 col-sm-2 thumbnail">
						<img src="http://placehold.it/100x100" alt="Img" class="img-responsive img-rounded">
						<div class="textcenter">
							<a href="item.php?id=5"><h5>Item 1</h5></a>
							<p >50€</p>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 thumbnail">
						<img src="http://placehold.it/100x100" alt="Img" class="img-responsive img-rounded">
						<div class="textcenter">
							<a href="item.php?id=5"><h5>Item 2</h5></a>
							<p>10€</p>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 thumbnail">
						<img src="http://placehold.it/100x100" alt="Img" class="img-responsive img-rounded">
						<div class="textcenter">
							<a href="item.php?id=5"><h5>Item 3</h5></a>
							<p>70€</p>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 thumbnail">
						<img src="http://placehold.it/100x100" alt="Img" class="img-responsive img-rounded">
						<div class="textcenter">
							<a href="item.php?id=5"><h5>Item 4</h5></a>
							<p>20€</p>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 thumbnail">
						<img src="http://placehold.it/100x100" alt="Img" class="img-responsive img-rounded">
						<div class="textcenter">
							<a href="item.php?id=5"><h5>Item 5</h5></a>
							<p>50€</p>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 thumbnail">
						<img src="http://placehold.it/100x100" alt="Img" class="img-responsive img-rounded">
						<div class="textcenter">
							<a href="item.php?id=5"><h5>Item 6</h5></a>
							<p>10€</p>
						</div>
					</div>
				</div></div>
		</div>
	</div>
</div>

<!-- Footer -->

<div id="footer">
    <div class="container">
    	<div class="row">
    		<div class="col-lg-6 col-sm-6"><p class="credit text-muted"><em>Created by Dmitrii Cucleschin, Andrei Giurgiu and Nikolche Kolev. ©2013</em></p></div>
    		<div class="col-lg-2 col-sm-2 col-lg-offset-4 col-sm-offset-4 text-muted"><a class="text-muted" data-toggle="modal" href="#about-modal">About</a> | <a class="text-muted" data-toggle="modal" href="#contact-modal">Imprint</a></div>
    	</div>
	</div>
</div>

<!-- Common modal windows -->

<div class="modal fade" id="results-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	      <h4 class="modal-title">Results</h4>
	    </div>
	    <div class="modal-body">
	      	<div id="results-content">
	      	</div>
	    </div>
	  </div>
	</div>
</div>

<div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	      <h4 class="modal-title">Contact information</h4>
	    </div>
	    <div class="modal-body">
	      	<p>For all the inquiries, including but not limited to help requests, suggestions, bug notifications etc., please contact us via one of the following emails:</p>
	      	<p><em><strong>d.cucleschin</strong>_at_jacobs-university.de</em></p>
	      	<p><em><strong>an.giurgiu</strong>_at_jacobs-university.de</em></p>
	      	<p><em><strong>n.kolev</strong>_at_jacobs-university.de</em></p>

	      	<small class="text-muted">For each external link existing on this website, we initially have checked that the target page does not contain contents which is illegal wrt. German jurisdiction. However, as we have no influence on such contents, this may change without our notice. Therefore we distance ourselves from the contents of any website referenced through our external links. This website is student lab work and does not necessarily reflect Jacobs University Bremen opinions. Jacobs University Bremen does not endorse this site, nor is it checked by Jacobs University Bremen regularly, nor is it part of the official Jacobs University Bremen web presence.</small>
	    </div>
	  </div>
	</div>
</div>

<div class="modal fade" id="about-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	      <h4 class="modal-title">About jTrader</h4>
	    </div>
	    <div class="modal-body">
	      	<p>jTrader was created by Dmitrii, Andrei and Nikolche as their practical project for Databases & Web Applications course.</p>
			<p>However, it never felt like an assignment, but more like a personal project, that can greatly improve our development skills and bring benefit to Jacobs University students and faculty.</p>
			<div class="thumbnail">
				<img src="http://placehold.it/500x300" alt="Img" class="img-responsive img-rounded">
				<div class="description">
					<a href="item.php?id=5"><h5>Here will be happy picture of us af</a>ter getting 1.0 in the course :)</h5>
				</div>
			</div>
	    </div>
	  </div>
	</div>
</div>

<!-- Scripts -->

<script>
 $("#logout").click(function () {
    $.post("inc/api.php", { action:'logout'}, function(results){
          	window.location.reload(true);
    });
  });
</script>

</body>
</html>