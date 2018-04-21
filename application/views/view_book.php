<body>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"> <?php echo $product['name']; ?>        
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('home'); ?>">Books</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $product['name']; ?></li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
        	<?php
        	$image = base_url().'books/'.$product['bookid'].'_detail'.$product['typef'];
          	echo '<img class="img-fluid" src="'.$image.'" alt="">';
          	 
          	?>
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Summary</h3>
          <p><?php echo $product['summary']; ?></p>
          <h3 class="my-3">Details</h3>
          <ul>
          	<?php 
          		echo '<li> Author: <code>'.$product['author'].'</code> </li>';
          		echo '<li> Cost: <code>'.$product['value'].'</code> </li>';
          		echo '<li> Kind: <code>'.$product['kind'].'</code> </li>';
          		echo '<li> Status: <code>'.$product['status'].'</code> </li>';
          	?>          	
          </ul>
          <?php
    			if ($product['status'] == 'Busy'){
    				echo '<form method="post" action="'.site_url('admin/play').'">
                    <button name="btn" class="btn btn-success" value="'.$product['bookid'].'"> Return </button>
                  </form>';
    			}
		  	?>	
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Related Books</h3>

      <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
