<!DOCTYPE html>
<html lang="vn">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php  echo base_url().'/themes/SA.png'; ?>" />
    <title> <?php echo $front_end['title']; ?></title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://developer.snapappointments.com/bootstrap-select/A.css,,_highlight.css+css,,_base.css+css,,_custom.css+dist,,_css,,_bootstrap-select.min.css,Mcc.PTlZ8WI6vG.css.pagespeed.cf.IFO09JJb81.css" rel="stylesheet">
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
            <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="<?php echo site_url('search'); ?>" id="form1">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." name="content">
                <span class="input-group-append">
                  <button class="btn btn-primary" type="submit" form="form1" name="btn" value=" ">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>                        
          </li>
          <li>
            <ul class="navbar-nav ml-auto"> 
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('rent'); ?>">Rent</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('contact'); ?>">Contact</a>
              </li>                      
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('about'); ?>">About</a>
              </li>                                   
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php
                  $image = base_url().'users/'.$user['username'].$user['typef'];
                   echo '<img src="'.$image.'" class="rounded-circle" alt="Cinque Terre" width="25" height="25"> '.$user['lastname'];
                   ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                  <a class="dropdown-item" href="<?php echo site_url('profile'); ?>">
                  <i class="fas fa-user"></i> Profile</a>                  
                  <a class="dropdown-item" href="<?php echo site_url('settings'); ?>"><i class="fas fa-cog"></i> Settings</a>     
                  <?php                  
                    if ($front_end['admin']){
                      echo '<a class="dropdown-item" href="'.site_url('admin').'">
                        <i class="fas fa-compass"></i> Management</a>';
                      echo '<a class="dropdown-item" href="'.site_url('admin/queue').'">
                        <i class="fas fa-check-circle"></i> Confirm</a>';
                    }
                  ?> 
                  <a class="dropdown-item" href="<?php echo site_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i> Logout</a>
                  
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    </nav>
    <?php
    $image = base_url().'themes/b2.jpg';
    ?>
    <header class="py-3 bg-image-full" style="background-image: url('<?php echo $image; ?>'); background-repeat: round;">   
      <div class="add">
        <style type="text/css">
          .add{
            padding: 100px;
          }
        </style>
      </div>    
    </header>