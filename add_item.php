<?php
	error_reporting(0);
	require_once(dirname(__FILE__).'/./inc/user.php');
	require_once(dirname(__FILE__).'/./inc/categories.php');
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
	<title>jTrader</title>
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
					<input id="search_bar" type="text" class="form-control" placeholder="Search">
				</div>
				<div id="search_button" class="btn btn-default">Go!</div>
			</form>
			<ul class="navbar-nav nav navbar-right">
				<li><a href="index.php">Home</a></li>
				<li><a data-toggle="modal" href="#about-modal">About</a></li>
				<li><a data-toggle="modal" href="#contact-modal">Contact</a></li>
				<?php
					$username = isLoggedIn();
					if (!$username) {
						echo '<li><a href="login.php">Login</a></li>';
					}
					else {
						echo '<li class="active"><a href="add_item.php">Add item</a></li>';
						echo '<li><a href="#" id="logout">Logout &nbsp;&nbsp;<em>('.$username.')</em></a></li>';
					}
				?>
			</ul>
		</div>
	</div>
</nav>

<!-- Convert PHP variables to JS -->

<div class="invisible" id="userid"><?php echo $_SESSION["user"]->eid; ?></div>

<!-- Main -->

<?php
	if (!$_SESSION["user"]) {
		echo '<div class="row"><div class = "container well"><br/><p class = "lead text-danger textcenter">Please, <a href="login.php">login</a> with your CampusNet account to add new items!</p></div></div>';
		exit();
	}
?>

<div class="row">
	<div class="container col-sm-offset-3 col-sm-offset-3 col-sm-offset-3 col-sm-6 col-md-6 col-lg-6">
		<br/>
		<p class="lead">Add new item:</p>
		<br/>

		<form class="form-horizontal" role="form">
		  <div class="form-group">
		    <label for="form_name" class="col-sm-2 col-md-2 col-lg2 control-label">Name</label>
		    <div class="col-sm-10 col-lg-10 col-md-10">
		      <input type="text" class="form-control" id="form_name">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="form_description" class="col-sm-2 control-label">Description</label>
		    <div class="col-sm-10 col-lg-10 col-md-10">
		      <textarea class="form-control" id="form_description" rows="5"></textarea>
		    </div>
		  </div>

		  <div class="form-group">
			<label for="form_category" class="col-sm-2 control-label">Category</label>
		    <div class="col-sm-10 col-lg-10 col-md-10">
		    	<select class="form-control" id="form_category">
				  <?php
				  	$result = getCategories();
				  	foreach($result as $category) {
				  		foreach($category['subcategories'] as $subcategory) {
				  			echo '<option>'.$category['category'].' / '.$subcategory.'</option>';
				  		}
				  	}
				  ?>
				</select> 
		    </div>
		  </div>


		  <div class="form-group">
		    <label for="form_price" class="col-sm-2 col-md-2 col-lg2 control-label">Price</label>
		    <div class="col-sm-6 col-lg-6 col-md-6">
		      <input type="text" class="form-control" id="form_price">
		    </div>
		  </div>

		  <div class="form-group">
		  	<label for="form_image" class="col-sm-2 control-label">Image</label>
		    <div class="col-sm-10 col-lg-10 col-md-10">
				<input type="file" id="form_image" name="form_image"/>
				<div id="image_preview"></div>
		    </div>
		  </div>

		  <br/>
		  <br/>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-sm-4 col-lg-4 col-md-4">
		      <div id="cancel_button" class="btn btn-default btn-block">Cancel</div>
		    </div>
		    <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-sm-4 col-lg-4 col-md-4">
		    	<div id = "submit_button" class="btn btn-success btn-block">Submit!</div>
		    </div>
		  </div>
</form>
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
					<h5>Here will be happy picture of us after getting 1.0 in the course :)</h5>
				</div>
			</div>
	    </div>
	  </div>
	</div>
</div>

<!-- Scripts -->

<script>

	function handleFileSelect(evt) {

	    var files = evt.target.files; // FileList object

	    // Loop through the FileList and render image files as thumbnails.
	    for (var i = 0, f; f = files[i]; i++) {

	      // Only process image files.
	      if (!f.type.match('image.*')) {
	        continue;
	      }

	      var reader = new FileReader();

	      // Closure to capture the file information.
	      reader.onload = (function(theFile) {
	        return function(e) {
	          // Render thumbnail.
	          document.getElementById('image_preview').innerHTML = '<br/><div class="container well"><img id="uploaded_img" class="img-responsive img-rounded center" src="'+ e.target.result+'" title="'+escape(theFile.name)+'"/></div>';
	        };
	      })(f);

	      // Read in the image file as a data URL.
	      reader.readAsDataURL(f);
	    }
 	}

  	document.getElementById('form_image').addEventListener('change', handleFileSelect, false);

	 $("#logout").click(function () {
	    $.post("inc/api.php", { action:'logout'}, function(results){
	          	window.location.reload(true);
	    });
	  });

	 $("#cancel_button").click(function () {
	    window.location.href = "index.php";
	  });

	 $("#submit_button").click(function () {
	 	
	 	var userid = $("#userid").html();
	 	var subcat = ($('#form_category option:selected').text()).split('/')[1].trim();
	 	var name = $("#form_name").val();
	 	var descr = $("#form_description").val();
	 	var image = $("#uploaded_img").attr('src');
	 	var price = +($("#form_price").val()); 

	 	if (!name || name == "") {
	 		alert("Name is a mandatory field - please fill it and try again!");
	 		return;
	 	}

	 	if (!descr || descr == "") {
	 		alert("Description is a mandatory field - please fill it and try again!");
	 		return;
	 	}

	 	if (!price || price == "" || isNaN(price)) {
	 		alert("Price is a mandatory field - please enter a valid numeric price and try again!");
	 		return;
	 	}

		$.post("inc/api.php", { action:'addOffer', args: [userid,subcat,name,descr,image,price]}, function(results){
		 	if (results === "true") {
		 		alert("Successfully posted!");
		 		location.href = "index.php";
		 	}
		 	else {
		 		console.log(results);
		 		alert("There was an error adding an offer. This shouldn't really happen.... Sorry :(");
		 	}
		});
	});

 $("#search_button").click( function() {
 	location.href = "search.php?query="+encodeURIComponent($("#search_bar").val());
 });

 $('#search_bar').keydown(function(event){    
      if(event.keyCode==13){
           $('#search_button').trigger('click');
           return false;
      }
  });


</script>
</body>
</html>