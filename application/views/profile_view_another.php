

<body>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"> This is, <?php echo $user_temp['firstname'].' '.$user_temp['lastname']; ?>        
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('user'); ?>">Users</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $user_temp['firstname'].' '.$user_temp['lastname']; ?></li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
        	<style type="text/css">	        	
        		.bg { 
				    /* The image used */
				    background-image: url("https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(20).jpg");

				    /* Full height */				    
				    height: 100%; 
				    width: 100%;
				    min-height: 300px;

				    /* Center and scale the image nicely */
				    background-position: center;
				    background-repeat: no-repeat;
				    background-size: cover;
				}      
        	</style>
        	<div class="bg">	
        		<div class="bottom">
	        	<?php
	        	$image = base_url().'users/'.$user['username'].$user['typef'];
	          	echo '<img class="img-thumbnail" src="'.$image.'" alt="" width="200" height="200" style="position:absolute;bottom:0">';
	          	?>	          	
	          	</div>
          	</div>
        </div>

        <div class="col-md-4">          
          <h3 class="my-3">Details</h3>
          <p>
          	This is private information.
          </p>          
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Borrowing books</h3>

      <div class="row">
            
      </div>
      <!-- /.row -->
      <!-- Related Projects Row -->
      <h3 class="my-4">Request borrowing</h3>

      <div class="row">
      	  
      </div>

      <h3 class="my-4">Request renting</h3>

      <div class="row">
      	
      </div>

      <h3 class="my-4">Rented books</h3>

      <div class="row">

      </div>

    </div>
    <!-- /.container -->
