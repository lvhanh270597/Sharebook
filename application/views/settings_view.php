
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
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đổi tên hiển thị
        <?php
          if (isset($error['general'])){
            echo '<code>'.$error['general'].' </code>';
          }
        ?>
      </div>
      <div class="card-body">
        <form action="<?php echo site_url('settings/change_name'); ?>" method="POST">   
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Tên mới (họ)<code>*</code></label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="" name="first" required>
              </div>              
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">              
              <div class="col-md-6">
                <label for="exampleInputName">Tên mới (tên)<code>*</code></label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="" name="last" required>
              </div>                
            </div>            
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Mật khẩu<code>*</code></label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="" name="password" required>
              </div>              
            </div>
          </div>     
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">                
                <input class="btn btn-primary btn-block" type="submit" name="btn2" value="Change">
              </div>              
            </div>
          </div>                    	
        </form>        
      </div>
    </div>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đổi mật khẩu
        <?php
          if (isset($error['general'])){
            echo '<code>'.$error['general'].' </code>';
          }
        ?>
      </div>
      <div class="card-body">
        <form action="<?php echo site_url('settings/change_password'); ?>" method="POST">  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Mật khẩu cũ<code>*</code></label>
                <input class="form-control" id="exampleInputName" type="password" aria-describedby="nameHelp" placeholder="" name="oldpass" required>
              </div>              
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">              
              <div class="col-md-6">
                <label for="exampleInputEmail1">Mật khẩu mới<code>*</code></label>
                <input class="form-control" id="exampleInputEmail1" type="password" aria-describedby="emailHelp" placeholder="" name="newpass">
              </div>              
            </div>            
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Nhập lại<code>*</code></label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="" name="conf" required>
              </div>              
            </div>
          </div>     
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">                
                <input class="btn btn-primary btn-block" type="submit" name="btn" value="Change">
              </div>              
            </div>
          </div>                    	
        </form>        
      </div>
    </div>
  </div>