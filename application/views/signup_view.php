<?php
    include_once "page_data_class.php";
    $page_data = new Page_Data();   
    $page_data->addCSS(base_url().'themes/theme2/vendor/font-awesome/css/font-awesome.min.css');
    #<!-- Custom styles for this template -->  
    $page_data->addCSS(base_url().'themes/theme2/css/sb-admin.css');
    $page_data->show_css();
?>
<body>  
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account
        <?php
          if (isset($error['general'])){
            echo '<code>'.$error['general'].' </code>';
          }
        ?>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php  echo site_url('signup'); ?>" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name<code>*</code></label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name" name="first" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name<code>*</code></label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name" name="last" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">                
                <label for="exampleInputEmail1">Username<code>*</code>
                  <?php
                    if (isset($error['username'])){
                      echo '<code>'.$error['username'].' </code>';
                    }
                  ?>
                </label>
                <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Username" name="username" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Email address</label>
                <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
              </div>              
            </div>            
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password<code>*</code>
                  <?php
                    if (isset($error['password'])){
                      echo '<code> <pre>'.$error['password'].'</pre> </code>';
                    }
                  ?>
                </label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password<code>*</code>
                  <?php  
                    if (isset($error['confirm'])){
                      echo '<code> '.$error['confirm'].'</code>';
                    }
                  ?>
                </label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password" name="conf" required>
              </div>
            </div>
          </div>
          <div class="form-group">
          	<div class="form-row">              
              <div class="col-md-6">
                <label for="phoneinput">Phone<code>*</code></label>
                <input class="form-control" id="exampleConfirmPassword" type="text" placeholder="Number phone" name="phone" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputImage">Image<code>*</code></label>
          		<input type="file" name="inp-file" required>
              </div>
            </div>          		
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="btn" value="Register">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo site_url('login'); ?>">Login Page</a>
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>


