<!-- <table>
	<caption>User</caption>
	<thead>
		<tr>
			<th>User_id</th>
			<th>Role</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Gender</th>
			<th>Email_address</th>
			<th>Password</th>
			<th>Token</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($list_users as $key => $user) : ?>
		<tr>
			<td><?php echo $user['user_id']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
			<td><?php echo $user['lastname']; ?></td>
			<td><?php echo $user['gender']; ?></td>
			<td><?php echo $user['email_address']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['token']; ?></td>
			<td><?php echo $user['status']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table> -->

<?php
$people = array(
array("name"=>"Bob","age"=>8,"colour"=>"red"),
array("name"=>"Greg","age"=>12,"colour"=>"blue"),
array("name"=>"Andy","age"=>5,"colour"=>"purple"));

var_dump($people);

$sortArray = array();

foreach($people as $person){
    foreach($person as $key=>$value){
        if(!isset($sortArray[$key])){
            $sortArray[$key] = array();
        }
        $sortArray[$key][] = $value;
    }
}

$orderby = "name"; //change this to whatever key you want from the array

array_multisort($sortArray[$orderby],SORT_DESC,$people);

var_dump($people);
?>

Output from first var_dump:

[0]=&gt;
  array(3) {
    ["name"]=&gt;
    string(3) "Bob"
    ["age"]=&gt;
    int(8)
    ["colour"]=&gt;
    string(3) "red"
  }
  [1]=&gt;
  array(3) {
    ["name"]=&gt;

    string(4) "Greg"
    ["age"]=&gt;
    int(12)
    ["colour"]=&gt;
    string(4) "blue"
  }
  [2]=&gt;
  array(3) {
    ["name"]=&gt;
    string(4) "Andy"
    ["age"]=&gt;
    int(5)
    ["colour"]=&gt;

    string(6) "purple"
  }
}

Output from 2nd var_dump:

array(3) {
  [0]=&gt;
  array(3) {
    ["name"]=&gt;
    string(4) "Greg"
    ["age"]=&gt;
    int(12)
    ["colour"]=&gt;
    string(4) "blue"
  }
  [1]=&gt;
  array(3) {
    ["name"]=&gt;

    string(3) "Bob"
    ["age"]=&gt;
    int(8)
    ["colour"]=&gt;
    string(3) "red"
  }
  [2]=&gt;
  array(3) {
    ["name"]=&gt;
    string(4) "Andy"
    ["age"]=&gt;
    int(5)
    ["colour"]=&gt;

    string(6) "purple"
  } 
