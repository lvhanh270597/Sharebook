
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
              <div class="dropdown bootstrap-select dropup">
              <select class="selectpicker" tabindex="-98" name="num">
                <option>a week</option>
                <option>two weeks</option>
                <option>three weeks</option>
                <option>a month</option>
              </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Mustard" aria-expanded="false"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Mustard</div></div> </div></button><div class="dropdown-menu" role="combobox" x-placement="top-start" style="max-height: 224px; overflow: hidden; min-height: 0px; position: absolute; transform: translate3d(0px, -116px, 0px); top: 0px; left: 0px; will-change: transform;"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1" style="max-height: 206px; overflow-y: auto; min-height: 0px;"><ul class="dropdown-menu inner show"><li class="selected active"><a role="option" class="dropdown-item selected active" aria-disabled="false" tabindex="0" aria-selected="true"><span class="fa bs-ok-default check-mark"></span><span class="text">Mustard</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class="fa bs-ok-default check-mark"></span><span class="text">Ketchup</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class="fa bs-ok-default check-mark"></span><span class="text">Relish</span></a></li></ul></div></div>
              </div>                
                <button name="btn" class="btn btn-success" value="'.$product['bookid'].'"> Borrow </button>                
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
