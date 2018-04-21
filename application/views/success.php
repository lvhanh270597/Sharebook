
<div class="container">
  <h1 class="mt-4 mb-3">Thông báo</h1>
  	<p class="text-success">
  		<?php
			echo $content;
		?>			
	</p>
</div>


<script type="text/javascript">
	function X(){
		setTimeout("Y()", 3000);
	}
	function Y(){
		window.location ="<?php echo site_url('settings'); ?>";
	}
	window.onload=X;
</script>
