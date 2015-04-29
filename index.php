<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Child Rummy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Child Rummy, Card Game">
    <meta name="author" content="Mat Gilbert">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">    
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

  </head>

  <body>

    <div class="container-narrow">

      <div class="masthead">
	  	<!-- In case I need these nav items later
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul> 
        -->
        <h3 class="muted">Child Rummy</h3>
      </div>

      <hr>

      <div class="jumbotron">
        <h1>Start a new Game</h1>
        <br/>
        <!--<p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p> -->
        <a id="startGame" class="btn btn-large btn-success" href="#">Deal Cards</a>
      </div>


      <div class="row-fluid marketing">
        <div class="span6">
		
			<div><p>P1 Cards: </p><div id="p1_cards"></div></div>
			<div><p>P2 Cards: </p><div id="p2_cards"></div></div>
		
        </div>
      </div>

      <hr>

      <div class="footer">
        <p>&copy; Mat Gilbert 2015</p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/main.js"></script>    


  </body>
</html>
