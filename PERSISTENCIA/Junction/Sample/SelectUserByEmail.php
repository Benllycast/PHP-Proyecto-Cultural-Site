<?php
// require dependencies
require("Domain/JunctionUser.php");
require("../Junction.php");

// create a new Junction session for the user object
$junction = Junction::construct("JunctionUser");

// fetch the users from the database with email foo@bar.com
$clause = $junction->createQuery("email = ?");
$clause->bind(0, "foo@bar.com");
$users = $junction->loadWhere($clause);

?>
<strong>Registered Users with Email foo@bar.com</strong>
<table>
	<tr>
		<th>id</th>
		<th>email</th>
		<th>password</th>
		<th>date</th>
	</tr>
<?php

// walk through the iterator of users
foreach ($users as $user) {
?>
	<tr>
		<td><?php echo $user->getId(); ?></td>
		<td><?php echo $user->getEmail(); ?></td>
		<td><?php echo $user->getPassword(); ?></td>
		<td><?php echo $user->getDate(); ?></td>
	</tr>
<?php
}
?>
</table>
<hr />
<code>
<pre>
// require dependencies
require("Domain/JunctionUser.php");
require("../Junction.php");

// create a new Junction session for the user object
$junction = Junction::construct("JunctionUser");

// fetch the users from the database with email foo@bar.com
$clause = $junction->createQuery("email = ?");
$clause->bind(0, "foo@bar.com");
$users = $junction->loadWhere($clause);

foreach ($users as $user) {
	// generate table row
}
</pre>
</code>