<html>
<head>
<title>Admin - Member List</title>
</head>
<body>
	<a href="<?=base_url()."index.php/c_admin/home"?>">List Member</a> | 
	<a href="<?=base_url()."index.php/c_admin/create_member"?>">Create Member</a> | 
	<a href="<?=base_url()."index.php/c_admin/article"?>">Article</a> | 
	<a href="<?=base_url()."index.php/c_admin/logout"?>">Logout</a>
	<table width=50% border="1">
		<tr>
			<th>User ID</th>
			<th>User Name</th>
			<th>Payment Status</th>
			<th>Type</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		<?php 
		foreach ($rows as $row){
			$payment = "";
			$type = "";
			if ($row->user_status == "1") $payment = "Unpaid";
			else $payment = "Paid";
			switch ($row->user_type){
				case "1" : $type = "Trial"; break;
				case "2" : $type = "Paket 1"; break;
				case "3" : $type = "Paket 2"; break;
			}
		?>
		<tr>
			<td><?=$row->user_id?></td>
			<td><?=$row->user_name?></td>
			<td><?=$payment?></td>
			<td><?=$type?></td>
			<td><a href="<?="c_signup/update/".$row->user_id?>">Update</a></td>
			<td><a href="<?="c_admin/delete_user/".$row->user_id?>">Delete</a></td>
		</tr>
		<?php }?>
	</table>
</body>
</html>
