

<body>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"> Hello, <?php echo $user_temp['firstname'].' '.$user_temp['lastname']; ?>        
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
	        	$image = base_url().'users/'.$user_temp['username'].$user_temp['typef'];
	          	echo '<img class="img-thumbnail" src="'.$image.'" alt="" width="200" height="200" style="position:absolute;bottom:0">';
	          	?>	          	
	          	</div>
          	</div>
        </div>

        <div class="col-md-4">          
          <h3 class="my-3">Details</h3>
          <ul>
          	<?php           		
          		echo '<li> Username: <code>'.$user_temp['username'].'</code> </li>';
          		echo '<li> Name: <code>'.$user_temp['firstname'].' '.$user_temp['lastname'].'</code> </li>';
          		echo '<li> Money: <code>'.$user_temp['money'].'(vnd) </code> </li>';    		
          	?>          	
          </ul>          
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Borrowing books</h3>

      <div class="row">
      	<?php
			foreach ($borrow as $key => $value) {
				echo '<div class="col-md-3 col-sm-6 mb-4">';
				echo '<a href="'.site_url('admin/view_book/'.$value['bookid']).'">'.$value['name'];
				$image = base_url().'/books/'.$value['bookid'].'_home'.$value['typef'];
				echo '<img class="img-fluid" src="'.$image.'" alt=""> 
				</a>
				</div>';
			}
		?>        
      </div>
      <!-- /.row -->
      <!-- Related Projects Row -->
      <h3 class="my-4">Request borrowing</h3>

      <div class="row">
      	<?php
			foreach ($req_borrow as $key => $value) {
				echo '<div class="col-md-3 col-sm-6 mb-4">';
				echo '<a href="'.site_url('admin/view_book/'.$value['bookid']).'">'.$value['name'];
				$image = base_url().'/books/'.$value['bookid'].'_home'.$value['typef'];
				echo '<img class="img-fluid" src="'.$image.'" alt=""> 
				</a>
				</div>';
			}
		?>       
      </div>

      <h3 class="my-4">Request renting</h3>

      <div class="row">
      	<?php
			foreach ($req_rent as $key => $value) {
				echo '<div class="col-md-3 col-sm-6 mb-4">';
				echo '<a href="'.site_url('admin/view_book/'.$value['bookid']).'">'.$value['name'];
				$image = base_url().'/books/'.$value['bookid'].'_home'.$value['typef'];
				echo '<img class="img-fluid" src="'.$image.'" alt=""> 
				</a>
				</div>';
			}
		?>       
      </div>

      <h3 class="my-4">Rented books</h3>

      <div class="row">
      	<?php
			foreach ($rent as $key => $value) {
				echo '<div class="col-md-3 col-sm-6 mb-4">';
				echo '<a href="'.site_url('admin/view_book/'.$value['bookid']).'">'.$value['name'];
				$image = base_url().'/books/'.$value['bookid'].'_home'.$value['typef'];
				echo '<img class="img-fluid" src="'.$image.'" alt=""> 
				</a>
				</div>';
			}
		?>       
      </div>

    </div>
    <!-- /.container -->