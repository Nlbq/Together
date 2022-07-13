<table>
	<caption>Invoice</caption>
	<thead>
		<tr>
			<th>Invoice_id</th>
			<th>User_id</th>
			<th>At</th>
			<th>Status</th>
			<th>Payment_method</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_invoices as $key => $invoice) : ?>
		<tr>
			<td><?php echo $invoice['invoice_id']; ?></td>
			<td><?php echo $invoice['user_id']; ?></td>
			<td><?php echo $invoice['at']; ?></td>
			<td><?php echo $invoice['status']; ?></td>
			<td><?php echo $invoice['payment_method']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>