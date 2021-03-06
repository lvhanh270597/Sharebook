
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
        	$image = base_url().'books/'.$product['bookid'].''.$product['typef'];
          	echo '<img class="img-fluid" src="'.$image.'" alt="">';
          	 
          	?>
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Tóm tắt nội dung</h3>
          <p><i><?php echo $product['summary']; ?></i></p>
          <h3 class="my-3">Chi tiết</h3>
          <table class="table table-hover">      
            <tbody>
              <tr>
                <td>Tác giả:</td>
                <td><strong><?php echo $product['author']; ?></strong></td>                
              </tr>
              <tr>
                <td>Loại:</td>
                <td><strong><?php echo $product['kind']; ?></strong></td>                
              </tr>
              <tr>
                <td>Trạng thái: </td>
                <td><strong><?php echo $product['status']; ?></strong></td>                
              </tr>
              <tr>
                <td>Tiền đặt cọc:</td>
                <td><strong><?php echo $product['value']; ?>k</strong></td>                
              </tr>
            </tbody>
          </table>                            
          <?php
      			if ($product['status'] == 'Available'){
      				echo '<form method="post" action="'.site_url('borrow/play').'">              

            <div class="row">
              <div class="col-md-6">              
                <select class="browser-default custom-select" name="num">
                  <option selected>Bạn mượn bao lâu?</option>
                  <option value="1">Một tuần</option>
                  <option value="2">Hai tuần</option>
                  <option value="3">Ba tuần</option>
                  <option value="4">Một tháng</option>
                </select>
              </div>
              <div class="col-md-6">
                <button name="btn" class="btn btn-success" value="'.$product['bookid'].'"> Borrow </button>  
              </div>
            </div>              
              </form>';
      			}
		  	  ?>	
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Related Books</h3>

      <div class="row">
        

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<div>
</div>
