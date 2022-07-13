<table>
	<caption>Customer</caption>
	<thead>
		<tr>
			<th>Customer_id</th>
			<th>Gender</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Company_name</th>
			<th>Email_address</th>
			<th>Password</th>
			<th>Address</th>
			<th>Zip_code</th>
			<th>Country</th>
			<th>City</th>
			<th>Phone_number</th>
			<th>Siret</th>
			<th>Siren</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_customers as $key => $customer) : ?>
		<tr>
			<td><?php echo $customer['customer_id']; ?></td>
			<td><?php echo $customer['gender']; ?></td>
			<td><?php echo $customer['firstname']; ?></td>
			<td><?php echo $customer['lastname']; ?></td>
			<td><?php echo $customer['company_name']; ?></td>
			<td><?php echo $customer['email_address']; ?></td>
			<td><?php echo $customer['password']; ?></td>
			<td><?php echo $customer['address']; ?></td>
			<td><?php echo $customer['zip_code']; ?></td>
			<td><?php echo $customer['country']; ?></td>
			<td><?php echo $customer['city']; ?></td>
			<td><?php echo $customer['phone_number']; ?></td>
			<td><?php echo $customer['siret']; ?></td>
			<td><?php echo $customer['siren']; ?></td>
			<td><?php echo $customer['status']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>