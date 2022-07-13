<table>
	<caption>Deliverable</caption>
	<thead>
		<tr>
			<th>Deliverable_id</th>
			<th>Delivery_id</th>
			<th>Type</th>
			<th>Link</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_deliverables as $key => $deliverable) : ?>
		<tr>
			<td><?php echo $deliverable['deliverable_id']; ?></td>
			<td><?php echo $deliverable['delivery_id']; ?></td>
			<td><?php echo $deliverable['type']; ?></td>
			<td><?php echo $deliverable['link']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>