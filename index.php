<?php
require_once('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="search">
    <meta name="gvchowdary" content="yfsearch">
    

    <title>YFS</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<style type="text/css">
		html { 
			background: url(dist/b.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}

		body {
			background: transparent;	
		}

		.row {
			margin: 10px 0px;
		}

		.block {
			border-radius: 20px;
			background-color: #fff;
			padding:10px;
			border: 1px #eee solid;
			opacity: 0.8;
		}	
		
		.flickr img {
			width: 100%;
			max-height: 400px;
			margin-bottom: 20px;
		}
	</style>          
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container-fluid">
		<div class="row">
			<div class="search-header col-lg-12">
				<div class="block">
					<div class="masthead">                          
						<h3 class="text-muted" style="padding-left: 10px; Font-family: Miller; font-style: bold;"><span style="color: Red">Y</span>ou<span style="color: Red">F</span>lick Search</h3>
						<form method="GET">
							<div class="col-lg-6">
								<input type="search" class="form-control" id="q" name="q" placeholder="Enter Search Term" Required>
									</div> 
											<div class="col-lg-3">
										Max Results: <input style="padding-top:8px;"type="number" id="maxResults" name="maxResults" min="1" max="50" step="1" value="10">
								</div>
										<button type="submit" class="btn btn-primary btn-md" style="width:150px;">Search</button>
								
							
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
      <div class="row">
        <div class="youtube col-lg-6">
			<div class="block">
			  <h2>Youtube</h2>
			  <?php displayYoutube() ?>
			</div>
		</div>
		<div class="flickr col-lg-6">
			<div class="block">
				<h2>Flickr</h2>
				<?php displayFlickr() ?>
				<a href="#" > Top </a>
			</div>
        </div>
      </div>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
