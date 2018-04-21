<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php  echo base_url().'/themes/SA.png'; ?>" />
    <title> <?php echo $front_end['title']; ?></title>

    <!-- Bootstrap core CSS -->
    <?php
    	include_once "page_data_class.php";
    	$page_data = new Page_Data();
    	$page_data->addCSS(base_url().'themes/theme1/vendor/bootstrap/css/bootstrap.min.css');
    	$page_data->addCSS(base_url().'themes/theme1/css/modern-business.css');
    	$page_data->show_css();
    ?>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  </head>
  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('home'); ?>">Share Book</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">                                    
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('login'); ?>">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('signup'); ?>">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
