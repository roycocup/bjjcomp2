<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LFF Cup III</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="bower_components/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="bower_components/jquery-ui/themes/base/all.css" />
	<link rel="stylesheet" href="/css/main.css" />

	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>



	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">
					<img src="/img/lff_logo.jpg" style="max-width:30px;">
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Listings<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/fighter-list">Fighters List</a></li>
							<li><a href="/fighter-list-broken">Broken Down List</a></li>
						</ul>
					</li>
					<li><a href="/register">Register</a></li>
					<!-- <li><a href="/brackets">Brackets</a></li> -->
					<li><a href="/contacts">Contacts</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<div class="footer">
		<div class="container">
			<div class="row">
				{{-- <div class="col-lg-3">
					<a href="http://www.checkmatbjj.com/"><img src="/img/checkmat-logo.jpg" alt="" ></a>
				</div>
				<div class="col-lg-3">
					<a href="http://www.kvraco.com/"><img src="/img/kvra-sun-logo.jpg" alt="" ></a>
				</div> --}}
				<div class="col-lg-3">
					<a href="http://londonfightfactory.com/"><img src="/img/manxinha_logo-branco.png" alt="" style="max-width:300px" ></a>
				</div>
				<div class="col-lg-3 col-md-offset-1">
					<a href="http://www.tatamifightwear.com/"><img src="/img/tatami-logo.jpg" alt="" style="max-width:300px" ></a>
				</div>
				<div class="col-lg-3 col-md-offset-1">
					<a href="http://www.checkmatbjj.com/"><img src="/img/checkmat-logo.jpg" alt="" ></a>
				</div>
			</div>
			
		</div>
	</div>


</body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52382779-3', 'auto');
  ga('send', 'pageview');

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52382779-1', 'auto');
  ga('send', 'pageview');

</script>
</html>
