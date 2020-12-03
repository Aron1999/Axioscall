<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPressasd
 * @subpackage Twenty_Twentyasd
 * @since Twentdy Twenty 1.0
 */

?><!DOCTYPE html>
<!-- _________                .__         .__    __________                  __   .__
 /   _____/  ____    ____  |__|_____   |  |   \______   \_______   ____ _/  |_ |  |__    ____ _______  ______
 \_____  \  /  _ \ _/ ___\ |  |\__  \  |  |    |    |  _/\_  __ \ /  _ \\   __\|  |  \ _/ __ \\_  __ \/  ___/
 /        \(  <_> )\  \___ |  | / __ \_|  |__  |    |   \ |  | \/(  <_> )|  |  |   Y  \\  ___/ |  | \/\___ \
/_______  / \____/  \___  >|__|(____  /|____/  |______  / |__|    \____/ |__|  |___|  / \___  >|__|  /____  >
        \/              \/          \/                \/                            \/      \/            \/ -->
<html lang="nl">
<head>
  <title>Social Brothers</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/f33f74fb59.js" crossorigin="anonymous"></script>

  <!-- Vue.js -->
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

  <!-- Axios -->
  <script type='text/javascript' src='https://unpkg.com/axios/dist/axios.min.js'></script>
  
</head>

<body>
<header>
	<nav>
		<img src="<?php echo get_template_directory_uri();?>/img/nav-img-sb.jpg" class="nav-bg"></div>
		<div class="nav-bar">
			<a href="/">
				<img src="<?php echo get_template_directory_uri();?>/img/sblogo.svg" class="nav-logo" alt="Logo SocialBrothers">
			</a>
			<div class="menu">
				<a href="#">Blog</a>
				<a href="#">Home</a>
			</div>
		</div>
	</nav>

	<div class="banner">
		<img src="<?php echo get_template_directory_uri();?>/img/nav-img-sb.jpg">
		<?php if(is_front_page() == false ): ?>
			<h1><?php echo get_the_title(); ?></h1>
		<?php endif; ?>
	</div>
</header>

