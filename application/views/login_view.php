
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
      $page_data->addCSS(base_url().'themes/theme2/vendor/font-awesome/css/font-awesome.min.css');
    	#<!-- Custom styles for this template -->
    	$page_data->addCSS(base_url().'themes/theme1/css/modern-business.css');
    	$page_data->addCSS(base_url().'themes/theme2/css/sb-admin.css');
    	$page_data->show_css();
    ?>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Username
            <?php 
              if (isset($error['username'])){
                echo '<code> 
                '.$error['username'].'
                </code>';
              }
            ?>
            </label>
            <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Username" name="username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password
            <?php 
              if (isset($error['password'])){
                echo '<code> 
                '.$error['password'].'
                </code>';
              }
            ?>
            </label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" href="index.html" name="btn" value="Login" type="submit" />
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo site_url('signup'); ?>">Register an Account</a>
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>