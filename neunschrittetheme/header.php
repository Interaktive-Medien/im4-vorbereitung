<!DOCTYPE html>
<html lang="de-CH" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php bloginfo('name') ;?></title>
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url') ;?>">
    <?php wp_head() ;?>
  </head>
  <body <?php body_class() ;?>>
    <header>
      <a href="<?php echo home_url('/') ;?>">
	        <h1><?php bloginfo('name') ;?></h1>
      </a>
        <p><?php bloginfo('description') ;?></p>
        <nav>
            <?php wp_nav_menu(array('theme_location' => 'hauptnavigation')) ;?>
        </nav>
    </header>
    <main>
