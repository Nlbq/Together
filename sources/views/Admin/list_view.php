<table>
	<caption>Admin</caption>
	<thead>
		<tr>
			<th>Admin_id</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email_address</th>
			<th>Password</th>
			<th>Token</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_admins as $key => $admin) : ?>
		<tr>
			<td><?php echo $admin['admin_id']; ?></td>
			<td><?php echo $admin['firstname']; ?></td>
			<td><?php echo $admin['lastname']; ?></td>
			<td><?php echo $admin['email_address']; ?></td>
			<td><?php echo $admin['password']; ?></td>
			<td><?php echo $admin['token']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>