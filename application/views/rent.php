
<?php
    include_once "page_data_class.php";
    $page_data = new Page_Data();   
    $page_data->addCSS(base_url().'themes/theme2/vendor/font-awesome/css/font-awesome.min.css');
    #<!-- Custom styles for this template -->  
    $page_data->addCSS(base_url().'themes/theme2/css/sb-admin.css');
    $page_data->show_css();
?>
  <div class="container">    
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        <legend> <strong> Cho thuê sách </strong> </legend>
        <?php
          if (isset($error['general'])){
            echo '<code>'.$error['general'].' </code>';
          }
        ?>        
      </div>
      <style>
        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 25px;            
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: #4CAF50;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #4CAF50;
            cursor: pointer;
        }
      </style>
      <div class="card-body">
        <form method="POST" action="<?php  echo site_url('rent/process'); ?>" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Tên sách<code>*</code></label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Nhập tên sách" name="name" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Loại sách<code>*</code></label>
                 <select class="form-control" name="kind">
                  <option>
                    Phát triển bản thân
                  </option>
                  <option>
                    Học tập
                  </option>
                </select>      
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">                            
              <div class="col-md-6">
                <label for="exampleInputLastName">Tác giả<code>*</code></label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Tên tác giả" name="author" name="author" required>
              </div>
              <div class="col-md-6">
                <div class="slidecontainer">                 
                  <p>Tiền đặt cọc<code>*</code>: <strong id="demo" > </strong> </p> 
                  <input type="range" min="1" max="200" value="50" class="slider" id="myRange" name="value">
                </div>
              </div>
            </div>            
          </div>
          <div class="form-group">
            <div class="form-row">                            
              <div class="col-md-12">                
                <textarea class="form-control" rows="5" id="comment" placeholder="Tóm tắt nội dung" name="summary"></textarea>
              </div>              
            </div>            
          </div>
          <div class="form-group">
            <div class="form-row">  
              <div class="col-md-12">                
                <label for="exampleInputLastName">Ảnh bìa<code>*</code></label>
              </div>            
              <div class="col-md-12">
                <div class="custom-file">                  
                  <input type="file" class="custom-file-input" id="validatedCustomFile" name="inp-file" required>
                  <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>                  
                </div>
              </div>
            </div>          		
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="btn" value="Gửi">
        </form>        
      </div>
    </div>
  </div>
<script type="text/javascript">
  var slider = document.getElementById("myRange");
  var output = document.getElementById("demo");
  output.innerHTML = slider.value + 'k'; // Display the default slider value

  // Update the current slider value (each time you drag the slider handle)
  slider.oninput = function() {
      output.innerHTML = this.value + 'k';
  } 
</script>