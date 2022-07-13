<table>
	<caption>Customer_information</caption>
	<thead>
		<tr>
			<th>Customer_information_id</th>
			<th>User_id</th>
			<th>Company_name</th>
			<th>Address</th>
			<th>Zip_code</th>
			<th>Country</th>
			<th>City</th>
			<th>Phone_number</th>
			<th>Siret</th>
			<th>Siren</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_customer_informations as $key => $customer_information) : ?>
		<tr>
			<td><?php echo $customer_information['customer_information_id']; ?></td>
			<td><?php echo $customer_information['user_id']; ?></td>
			<td><?php echo $customer_information['company_name']; ?></td>
			<td><?php echo $customer_information['address']; ?></td>
			<td><?php echo $customer_information['zip_code']; ?></td>
			<td><?php echo $customer_information['country']; ?></td>
			<td><?php echo $customer_information['city']; ?></td>
			<td><?php echo $customer_information['phone_number']; ?></td>
			<td><?php echo $customer_information['siret']; ?></td>
			<td><?php echo $customer_information['siren']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>