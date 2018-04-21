<div class="container">
	<h3 class="mt-4 mb-3">Users management </h3>
	<table class="table table-hover">
    <thead>
      <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Delete</th>
        <th>Set zero</th>
      </tr>
    </thead>
    <tbody>    
	    <?php
			foreach ($users as $key => $value) {
				$username = $value['username'];
				$name = $value['firstname'].' '.$value['lastname'];
				$phone = $value['phone'];
				echo '<tr>';				
				echo '<td> <a href="'.site_url('admin/view_user/'.$username).'"> '.$username.' </a> </td>';
				echo '<td> '.$name.' </td>';
				echo '<td> '.$phone.' </td>';
				echo '<td> <a href="'.site_url('admin/delete_user/'.$username).'"> Delete </a> </td>';
				echo '<td><a href="'.site_url('admin/set_zero_money/'.$username).'"> Set zero </a></td>';
				echo '</tr>';
			}
		?>       
    </tbody>
  </table>

  <h3 class="mt-4 mb-3">Books management </h3>
	<table class="table table-hover">
    <thead>
      <tr>
      	<th>ID</th>
        <th>Name</th>
        <th>Kind</th>
        <th>Status</th>
        <th>Provider</th>
        <th>Delete</th>        
      </tr>
    </thead>
    <tbody>    
	    <?php
			foreach ($books as $key => $value) {
				$bookid = $value['bookid'];
				$name = $value['name'];				
				$kind = $value['kind'];
				$status = $value['status'];				
				$provider = $value['provider'];
				echo '<tr>';				
				echo '<td> '.$bookid.' </td>';
				echo '<td> <a href="'.site_url('admin/view_book/'.$bookid).'"> '.$name.' </a> </td>';
				echo '<td> '.$kind.' </td>';
				echo '<td> '.$status.' </td>';				
				echo '<td> '.$provider.' </td>';
				echo '<td> <a href="'.site_url('admin/delete_book/'.$value['bookid']).'"> Delete </a> </td>';
				echo '</tr>';
			}
		?>       
    </tbody>
  </table>
</div>