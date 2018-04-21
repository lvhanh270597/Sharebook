<!-- Footer -->
  <style type="text/css">
      .add{
        margin-top: 150px;
      }
  </style>
  <div class="add">
  </div>
    <footer class="py-3 bg-black">
      <div class="container">
        <p class="m-0 text-white small"><strong> Share Book <strong></p>
        <p class="m-0 text-white small">Địa chỉ: Tòa nhà D6, Kí túc xá khu B, ĐHQG TP. HCM</p>
        <p class="m-0 text-white small">Số điện thoại: 01653001562</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <?php
    	include_once "page_data_class.php";
    	$page_data = new Page_Data();
    	$page_data->addScript(base_url().'/themes/theme1/vendor/jquery/jquery.min.js');
    	$page_data->addScript(base_url().'/themes/theme1/vendor/bootstrap/js/bootstrap.bundle.min.js');
    	$page_data->show_js();
    ?>
  </body>

</html>