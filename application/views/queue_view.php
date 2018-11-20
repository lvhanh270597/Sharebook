<div class="container">
	<h3 class="mt-4 mb-3">Rent request </h3>
	<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Requester</th>
        <th>Book</th>
        <th>Accept</th>
        <th>Deny</th>
      </tr>
    </thead>
    <tbody>    
	    <?php
			foreach ($rent as $key => $value) {
				$reqid = $value['req_id'];
				$req_er = $value['req_er'];
				$bookid = $value['bookid'];				
				echo '<tr>';				
				echo '<td>'.$reqid.'</td>';
				echo '<td> <a href="'.site_url('admin/view_user/'.$req_er).'"> '.$req_er.' </a> </td>';
				echo '<td> <a href="'.site_url('admin/view_book/'.$bookid).'">'.$bookid.'</a> </td>';
				echo '<td> <a href="'.site_url('admin/accept/'.$req_er.'/'.$reqid).'"> Accept </a> </td>';
				echo '<td> <a href="'.site_url('admin/deny/'.$reqid).'"> Deny </a> </td>';
				echo '</tr>';
			}
		?>       
    </tbody>
  </table>
	<h3 class="mt-4 mb-3">Borrow request </h3>
	<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Week(s)</th>
	        <th>Borrower</th>
	        <th>Book</th>
	        <th>Accept</th>
	        <th>Deny</th>
	      </tr>
	    </thead>
    	<tbody>    
	    <?php
			foreach ($borrow as $key => $value) {
				$reqid = $value['req_id'];
				$req_er = $value['req_er'];
				$bookid = $value['bookid'];	
				$weeks = $value['weeks'];				
				echo '<tr>';				
				echo '<td>'.$reqid.'</td>';
				echo '<td>'.$weeks.'</td>';
				echo '<td> <a href="'.site_url('admin/view_user/'.$req_er).'"> '.$req_er.' </a> </td>';
				echo '<td> <a href="'.site_url('admin/view_book/'.$bookid).'">'.$bookid.'</a> </td>';
				echo '<td> <a href="'.site_url('admin/accept/'.$req_er.'/'.$reqid).'"> Accept </a> </td>';
				echo '<td> <a href="'.site_url('admin/deny/'.$reqid).'"> Deny </a> </td>';
				echo '</tr>';
			}
		?>       
    	</tbody>
  	</table>
 </div>