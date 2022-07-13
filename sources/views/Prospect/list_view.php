<table>
	<caption>Prospect</caption>
	<thead>
		<tr>
			<th>Prospect_id</th>
			<th>Company_name</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email_address</th>
			<th>Phone_number</th>
			<th>Source</th>
			<th>Type_source</th>
			<th>Status</th>
			<th>Gender</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_prospects as $key => $prospect) : ?>
		<tr>
			<td><?php echo $prospect['prospect_id']; ?></td>
			<td><?php echo $prospect['company_name']; ?></td>
			<td><?php echo $prospect['firstname']; ?></td>
			<td><?php echo $prospect['lastname']; ?></td>
			<td><?php echo $prospect['email_address']; ?></td>
			<td><?php echo $prospect['phone_number']; ?></td>
			<td><?php echo $prospect['source']; ?></td>
			<td><?php echo $prospect['type_source']; ?></td>
			<td><?php echo $prospect['status']; ?></td>
			<td><?php echo $prospect['gender']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>