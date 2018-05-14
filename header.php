<?php
//error_reporting(E_ALL);
//ini_set('xdebug.var_display_max_depth', 5);
//ini_set('xdebug.var_display_max_children', 256);
//ini_set('xdebug.var_display_max_data', 4096);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="robots" content="index,follow" />
<?php if(__PAGE__ == 'home') : ?>
	<title>Maya Films</title>
	<meta name="description" content="A film production house based out of Bangalore with over 18 years in the business">
	<meta name="keywords" content="Maya Films, Maya Chandra, Filmmaker, Film Makers, Film Making Bangalore, Corporate Films, Corporate Communications, Film Production House, Film Production Bangalore, Film Production House Bangalore, Ad Films Production, Healthcare Films Production, Music Video Production, Documentary Film makers">
<?php elseif(__PAGE__ == 'work') : ?>
	<title>Maya Films – Projects</title>
	<meta name="description" content="A brief overview of past works by Maya Films ">
	<meta name="keywords" content="Maya Films, Maya Chandra, Filmmaker, Film Makers, Film Making Bangalore, Corporate Films, Corporate Communications, Film Production House, Film Production Bangalore, Film Production House Bangalore, Ad Films Production, Healthcare Films Production, Music Video Production, Documentary Film makers">
<?php elseif(__PAGE__ == 'academics') : ?>
	<title>Maya Films – Learn from the stalwarts</title>
	<meta name="description" content="Learning from the best @ Maya Films">
	<meta name="keywords" content="Maya Films, Maya Chandra, Filmmaker, Film Makers, Film Making Bangalore, Internships, Film making workshops, film appreciation, Film Editing">
<?php elseif(__PAGE__ == 'media') : ?>
	<title>Maya Films – Media presence</title>
	<meta name="description" content="Maya Films in the media">
	<meta name="keywords" content="Maya Films, Maya Chandra, Filmmaker, Film Makers">
<?php elseif(__PAGE__ == 'awards') : ?>
	<title>Maya Films – Kudos</title>
	<meta name="description" content="Recognitions for Maya Films">
	<meta name="keywords" content="Maya Films, Maya Chandra, Filmmaker, Film Makers, Chanakya Award, Annual Corporate Collateral Awards">
<?php elseif(__PAGE__ == 'contact') : ?>
	<title>Maya Films – Contact Us</title>
	<meta name="description" content="Reach out to Maya Films">
	<meta name="keywords" content="Maya Films, Maya Chandra, Filmmaker, Film Makers">
<?php endif; ?>

	<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,700" type="text/css" media="all" />-->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-83363308-1', 'auto');
		ga('send', 'pageview');
	</script>

	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media=" all" />
	<link rel="stylesheet" href="css/hover.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/sweetalert.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery.min.js">\x3C/script>')</script>
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="js/velocity.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
	<script type="text/javascript" src="js/scrollreveal.min.js"></script>
</head>
<body>

<header>
	<div class="container padded clearfix">
		<div class="header-desktop visible-sm visible-md visible-lg">
			<nav>
				<table>
					<tr>
						<td class="link"><a class="hvr-grow<?php echo((__PAGE__==='home')?' selected':''); ?>" href=".">WE</a></td>
						<td class="link"><a class="hvr-grow<?php echo((__PAGE__==='work')?' selected':''); ?>" href="projects.php">WORKS</a></td>
						<td class="link"><a class="hvr-grow<?php echo((__PAGE__==='academics')?' selected':''); ?>" href="academics.php">ACADEMICS</a></td>
						<td class="logo text-center"><a class="hvr-grow<?php echo((__PAGE__==='home')?' selected':''); ?>" href="."><img src="images/logo.png" /></a></td>
						<td class="link text-right"><a class="hvr-grow<?php echo((__PAGE__==='media')?' selected':''); ?>" href="media.php">MEDIA</a></td>
						<td class="link text-right"><a class="hvr-grow<?php echo((__PAGE__==='awards')?' selected':''); ?>" href="awards.php">AWARDS</a></td>
						<td class="link text-right"><a class="hvr-grow<?php echo((__PAGE__==='contact')?' selected':''); ?>" href="contact.php">CONTACT</a></td>
					</tr>
				</table>
			</nav>
		</div>
		<div class="visible-xs">
			<div class="header-tablet">
				<div class="logo text-center"><a class="<?php echo((__PAGE__==='home')?' selected':''); ?>" href="."><img src="images/logo.png" /></a></div>
				<nav>
					<ul class="clearfix">
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='home')?' selected':''); ?>" href=".">WE</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='work')?' selected':''); ?>" href="projects.php">WORKS</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='academics')?' selected':''); ?>" href="academics.php">ACADEMICS</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='media')?' selected':''); ?>" href="media.php">MEDIA</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='awards')?' selected':''); ?>" href="awards.php">AWARDS</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='contact')?' selected':''); ?>" href="contact.php">CONTACT</a></li>
					</ul>
				</nav>
			</div>
			<div class="header-mobile">
				<div class="clearfix">
					<div class="logo"><a class="<?php echo((__PAGE__==='home')?' selected':''); ?>" href="."><img src="images/logo.png" /></a></div>
					<div class="menu text-right"><a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a></div>
				</div>
				<nav style="display: none;">
					<ul class="clearfix">
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='home')?' selected':''); ?>" class="selected" href=".">WE</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='work')?' selected':''); ?>" href="projects.php">WORKS</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='academics')?' selected':''); ?>" href="academics.php">ACADEMICS</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='media')?' selected':''); ?>" href="media.php">MEDIA</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='awards')?' selected':''); ?>" href="awards.php">AWARDS</a></li>
						<li class="link text-center"><a class="hvr-grow<?php echo((__PAGE__==='contact')?' selected':''); ?>" href="contact.php">CONTACT</a></li>
					</ul>
				</nav>
			</div>
			<script>
				(function() {
					$('.header-mobile .menu a').click(function(e) {
						e.preventDefault();
						$('.header-mobile nav').slideToggle();
					});
				})();
			</script>
		</div>
		<!--<div class="link"><a href="#">WE</a></div>
		<div class="link"><a href="#">WORKS</a></div>
		<div class="logo text-center"><a href="#"><img src="images/logo.png" /></a></div>
		<div class="link text-right"><a href="#">AWARDS</a></div>
		<div class="link text-right"><a href="#">CONTACT</a></div>-->
	</div>
</header>
