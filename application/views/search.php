
<!-- Page Content -->
  <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      	<h3 class="mt-4 mb-3">Query = <?php echo $front_end['kind']; ?> </h3>
      	<ol class="breadcrumb">
        	<li class="breadcrumb-item">
          		<a href="#">Search</a>
        	</li>
        	<li class="breadcrumb-item active"> All </li>
      	</ol>

		    <div class="mb-0 mt-4">          
          <div class="row">
            <div class="col-md-8">
              <div class="card-columns">            
              <!-- Example Social Card-->
                <?php   
                foreach ($books as $key => $value) {
                  echo '<div class="card mb-3">';
                  $image = base_url().'books/'.$value['bookid'].''.$value['typef'];
                  $view = site_url('book/view/'.$value['bookid']);
                  echo '<a href="'.$view.'">
                      <img class="card-img-top img-fluid w-100" src="'.$image.'" alt=""> 
                      </a>';
                  echo '<div class="card-body">
                      <h6 class="card-title mb-1"><a href="'.$view.'">'.get_substr($value['name']).'</a></h6>';
                  echo '<p class="card-text small"> '.get_substr($value['summary']).'...';
                  echo '<br>Author: <strong> '.get_substr($value['author']).' </strong>';
                  echo '<br>Status: <strong> '.$value['status'].' </strong>';
                  echo '<br>Money: <strong> '.$value['value'].'k </strong> </p>
                      </div>';
                        
                  echo '<hr class="my-0">
                        <div class="card-body py-2 small">
                          <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                          <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-comment"></i>Comment</a>                          
                        </div>
                        <div class="card-footer small text-muted">Available on '.date('Y:m:d', strtotime($value['willbefree'])).'</div>
                       </div>';
                }
                ?>
                
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
                          <a href="<?php echo site_url('home/view/1'); ?>">Phát triển bản thân</a>
                        </li>                        
                      </ul>
                    </div>
                    <div class="col-lg-6">
                      <ul class="list-unstyled mb-0">
                        <li>
                          <a href="<?php echo site_url('home/view/2'); ?>">Học tập</a>
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