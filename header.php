<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="<?php the_author(); ?>">
    
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maxmum-scale=1">


	<!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Quicksand|Sorts+Mill+Goudy" rel="stylesheet">
    
    
    
	<link rel="shortcut icon" herf="<?php print IMAGES; ?>/icons/favicon.ico">
    <link rel="apple-touch-icon" herf="<?php print IMAGES; ?>/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" herf="<?php print IMAGES; ?>/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" herf="<?php print IMAGES; ?>/icons/apple-touch-icon-114x114.png">

    
    <?php wp_head(); ?>
	</head>
	

<body <?php body_class(); ?>>

	<header class="main">
  
        <div class ="headerInner" role="navigation">

        <div class="logo">
            <div class="logo-cont">
				<h2 class="styleNone">
					<a href="http://random.sprinklewithsalt.com"><?php bloginfo('name'); ?></a>
				</h2>
				<h4 class="styleNone">
					<a href="http://random.sprinklewithsalt.com"><?php bloginfo('description'); ?></a>
				</h4>
			</div>
        </div>

            <nav class="topMain">
              
					<?php wp_nav_menu(array(
						'menu_class' => 'noStyle',
						'container_class' => 'list',
						'theme_location' => 'menu'
					)); ?>
                 <!---RANDOM RESPONSIVE STUFF--->
           <div class="mobile-navigation" id="rwd-top-nav-btn">  
                <div id="rwd-navbutton">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
           </div>
            </nav>
        
       </div>
    </header>
    
    <div id="rwd-top-nav"></div> <!--end rwd-top-nav-->
