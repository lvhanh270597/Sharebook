
<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      	<h3 class="mt-4 mb-3">Toàn bộ thành viên </h3>
      	<ol class="breadcrumb">
        	<li class="breadcrumb-item">
          		<a href="<?php echo site_url('home'); ?>">Home</a>
        	</li>
        	<li class="breadcrumb-item active">Toàn bộ thành viên</li>
      	</ol>

		    <div class="mb-0 mt-4">          
          <div class="row">
            <div class="col-md-8">
              <div class="card-columns">            
              <!-- Example Social Card-->
                <?php   
                foreach ($users as $key => $value) {
                  echo '<div class="card mb-3">';
                  $image = base_url().'users/'.$value['username'].'_home'.$value['typef'];
                  $view = site_url('profile/view/'.$value['username']);                  
                  $name = $value['firstname'].' '.$value['lastname'];
                  echo '<a href="'.$view.'">
                      <img class="card-img-top img-fluid w-100" src="'.$image.'" alt=""> 
                      </a>';
                  echo '<div class="card-body">
                      <h6 class="card-title mb-1"><a href="'.$view.'">'.$name.'</a></h6>
                      </div>
                      </div>';
                }
                ?>

                <!-- Example Social Card-->                
              </div>
              <!-- /Card Columns-->
            <!-- Pagination -->
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </div>            
            <div class="col-md-4">    
            <!-- Search Widget -->
              <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>                           
              <!-- Categories Widget -->
              <div class="card my-4">
                <h5 class="card-header">Các loại sách</h5>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <ul class="list-unstyled mb-0">
                        <li>
                          <a href="#">Phát triển bản thân</a>
                        </li>                        
                      </ul>
                    </div>
                    <div class="col-lg-6">
                      <ul class="list-unstyled mb-0">
                        <li>
                          <a href="#">Học tập</a>
                        </li>                       
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Side Widget -->
              <div class="card my-4">
                <h5 class="card-header">Thông báo</h5>
                <div class="card-body">
                  Chưa có thông báo nào
                </div>
              </div>
            </div>
            </div>
          </div>

      </div>      
    </div>