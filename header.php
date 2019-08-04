<head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>    
        <meta charset="UTF-8">
        <title>Bangalore Co-operative Bank</title>
        <link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    </head>
<div class="navbar-fixed">
	<nav class="blue lighten-2">
		<div class="container nav-wrapper ">
			<a href="index.php" class="brand-logo black-text text-darken-1">BCBank</a>
			<ul class="right">
				<li><a class="black-text text-darken-1" href="index.php">Home</a></li>
				<li><a class="black-text text-darken-1" href="features.php">Services</a></li>
				<li><a class="black-text text-darken-1" href="contact.php">Contact</a></li>
				<li><a class="dropdown-button black-text text-darken-1" data-activates="dropdown" 
					data-beloworigin="true"><i class="material-icons left">settings</i>
					Other services<i class="material-icons right">arrow_drop_down</i></a>
				</li>
			</ul>
		</div>
	</nav>
</div>
<ul id="dropdown" class="dropdown-content collection">
	<a href="safeonlinebanking.php"> <span class="title black-text text-darken-1">Online banking tips</span></a>
    <a href="faq.php"><span class="title black-text text-darken-1">FAQ'S</span></a>
	<a href="t_c.php"><span class="title black-text text-darken-1">Terms and Conditions</span></a>
</ul>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='js/materialize.min.js'></script>
<script type="text/javascript">
    (function($) {
		$(function() {
            $('.dropdown-button').dropdown({
                hover: true,
            });
		});
    })(jQuery);
</script>