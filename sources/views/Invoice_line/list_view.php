<table>
	<caption>Invoice_line</caption>
	<thead>
		<tr>
			<th>Invoice_line_id</th>
			<th>Invoice_id</th>
			<th>Title</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Reduction</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_invoice_lines as $key => $invoice_line) : ?>
		<tr>
			<td><?php echo $invoice_line['invoice_line_id']; ?></td>
			<td><?php echo $invoice_line['invoice_id']; ?></td>
			<td><?php echo $invoice_line['title']; ?></td>
			<td><?php echo $invoice_line['price']; ?></td>
			<td><?php echo $invoice_line['quantity']; ?></td>
			<td><?php echo $invoice_line['reduction']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>