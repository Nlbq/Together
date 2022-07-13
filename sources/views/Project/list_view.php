<table>
	<caption>Project</caption>
	<thead>
		<tr>
			<th>Project_id</th>
			<th>Customer_id</th>
			<th>Name</th>
			<th>Type</th>
			<th>Description</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_projects as $key => $project) : ?>
		<tr>
			<td><?php echo $project['project_id']; ?></td>
			<td><?php echo $project['customer_id']; ?></td>
			<td><?php echo $project['name']; ?></td>
			<td><?php echo $project['type']; ?></td>
			<td><?php echo $project['description']; ?></td>
			<td><?php echo $project['status']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>