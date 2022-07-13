<table>
	<caption>Prospect_event</caption>
	<thead>
		<tr>
			<th>Prospect_event_id</th>
			<th>Prospect_id</th>
			<th>Comment</th>
			<th>At</th>
			<th>Type</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_prospect_events as $key => $prospect_event) : ?>
		<tr>
			<td><?php echo $prospect_event['prospect_event_id']; ?></td>
			<td><?php echo $prospect_event['prospect_id']; ?></td>
			<td><?php echo $prospect_event['comment']; ?></td>
			<td><?php echo $prospect_event['at']; ?></td>
			<td><?php echo $prospect_event['type']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>