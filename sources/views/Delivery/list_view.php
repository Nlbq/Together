<table>
	<caption>Delivery</caption>
	<thead>
		<tr>
			<th>Delivery_id</th>
			<th>Project_id</th>
			<th>Description</th>
			<th>Validation</th>
			<th>Validation_date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_deliverys as $key => $delivery) : ?>
		<tr>
			<td><?php echo $delivery['delivery_id']; ?></td>
			<td><?php echo $delivery['project_id']; ?></td>
			<td><?php echo $delivery['description']; ?></td>
			<td><?php echo $delivery['validation']; ?></td>
			<td><?php echo $delivery['validation_date']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>